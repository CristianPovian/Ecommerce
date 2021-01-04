<?php

    class AdminView extends CI_Model {

        public function export() {

            $this->load->helper('url');

            $incomingData = json_decode(file_get_contents("php://input"));
            $csvFile = fopen("CSV/items.csv", "w");
            json_encode($incomingData);
            
            foreach ($incomingData as $line) {
                
                foreach ($line as $key => $value) {
                    if (is_array($value)) {
                        $line[$key] = $value[0];
                    }
                }
                echo json_encode($line);
                
                fputcsv($csvFile, json_decode(json_encode($line), true));
                

              }

              
            fclose($csvFile);
            
            return "Exported things saved to file.";

        }

    }
    
?>