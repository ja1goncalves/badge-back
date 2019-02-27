<?php
/**
 * Created by PhpStorm.
 * User: joaopaulo
 * Date: 26/02/19
 * Time: 14:02
 */

namespace App\Services;
use PDF;

class BadgeService extends AppService
{

    /**
     * @param array $data
     * @return array
     */
    public function getBadges(array $data){
        $response = [
            'error' => true,
            'message' => 'Algo de errado não esta certo'
        ];

        if(empty($data['participants'])){
            $response['message'] = 'Nenhum participante foram selecionados para gerar os crachás.';
        }else if(empty($data['details_badge'])){
            $response['message'] = 'PDFs gerados pelo modo padrão.';
        }else{
            $txt_participants = $data['participants'];
            $participants = [];

            $lines = explode("\n", $txt_participants);
            $lines = array_splice($lines, 1, sizeof($lines) - 2);

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
            }catch (\Exception $e){
                $return['message'] = $e->getMessage();
            }

            if(empty($participants)){
                $response['message'] = 'Não foi possivel selecionar os participantes';
            }else{
                $response = $this->generatePDFsByParticipants($participants, $data['details_badge'], $data['layout']);
            }
        }

        return $response;
    }

    private function generatePDFsByParticipants(array $participants, $details_layout, $layout)
    {
        try{
            $data = [
                'participants' => $participants,
                'details_layout' => $details_layout,
                'layout' => $layout,
            ];

            $pdf = PDF::loadView('badges', $data);

            return $pdf;
        }catch (\Exception $e){
            $pdf = [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }

        return $pdf;
    }
}
