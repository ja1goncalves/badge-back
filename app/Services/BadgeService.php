<?php
/**
 * Created by PhpStorm.
 * User: joaopaulo
 * Date: 26/02/19
 * Time: 14:02
 */

namespace App\Services;
use PDF;
use View;

class BadgeService extends AppService
{

    const NOME ='nome';
    const INSTITUTION = 'instituição';
    const COUNTRY = 'país';
    const CATEGORY = 'categoria';
    const SUBSCRIPTION = 'inscrição';

    /**
     * @param array $data
     * @return array
     * @throws \Exception
     */
    public function getBadges(array $data){
        $response = [
            'error' => true,
            'message' => 'Algo de errado não esta certo'
        ];

        if(empty($data['participants'])){
            throw new \Exception('Nenhum participante foram selecionados para gerar os crachás.');
        }else if(empty($data['style_attributes'])){
            throw new \Exception('PDFs gerados pelo modo padrão.');
        }else{
            $txt_participants = $data['participants'];
            $participants = [];

            $lines = explode("\n", $txt_participants);
            $first_line = explode("\t", $lines[0]);

            $this->exceptions($first_line);

            $lines = array_splice($lines, 1, count($lines) - 1);

            try {
                foreach ($lines as $line) {
                    $participant = explode("\t", $line);

                    $participants[] = [
                        'name' => $participant[0],
                        'institution' => $participant[2],
                        'subscription' => $participant[4],
                        'category' => $participant[1],
                    ];
                }

                if(empty($participants)){
                    throw new \Exception('Não foi possivel selecionar os participantes');
                }else{
                    $pdf = $this->generatePDFsByParticipants($participants, $data['style_attributes'], $data['layout']);
                    $response = $pdf;
                }
            }catch (\Exception $e){
                $return['message'] = $e->getMessage();
            }
        }

        return $response;
    }

    /**
     * @param array $participants
     * @param $styles
     * @param $layout
     * @param string $page
     * @return array
     */
    private function generatePDFsByParticipants(array $participants, $styles, $layout, $page = 'a4')
    {
        try{
            $data = [
                'participants' => $participants,
                'styles' => $styles,
                'layout' => $layout,
            ];

            $view = View::make('badges', [
                'data' => $data
            ]);

            $html = $view->render();
            \Log::debug($html);

            $pdf = PDF::loadView('badges', ['data' => $data])->setPaper($page);
        }catch (\Exception $e){
            $pdf = [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }

        return $pdf;
    }

    /**
     * @param $first_line
     * @throws \Exception
     */
    private function exceptions($first_line)
    {
        if(empty($first_line)){
            throw new \Exception("Não foi possivel identificar os campos!");
        }else if(count($first_line) < 5){
            throw new \Exception("Falta alguns campos para fazer os preenchimentos.");
        }else if(strtolower($first_line[0]) == self::NOME){
            throw new \Exception("O campo nome não foi encontrado");
        }else if(strtolower($first_line[1]) == self::CATEGORY){
            throw new \Exception("O campo categoria/país não foi encontrado");
        }else if(strtolower($first_line[2]) == self::INSTITUTION){
            throw new \Exception("O campo instituição não foi encontrado");
        }else if(strtolower($first_line[4]) == self::SUBSCRIPTION){
            throw new \Exception("O campo inscrição não foi encontrado");
        }else{
            unset($first_line);
        }
    }
}
