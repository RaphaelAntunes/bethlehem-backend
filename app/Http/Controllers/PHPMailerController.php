<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PHPMailerController extends Controller
{
    public function enviarEmail(Request $request)
    {
        try {
            $emails = $request->input('emails');
            $assunto = $request->input('assunto');
            $msg = $request->input('msg');

            // Configurações do servidor SMTP
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host       = 'smtp.titan.email';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'ig@eye.lotomunir.com';
            $mail->Password   = '/;+!iO!K5G6Nd>_';
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

            // Configurações do remetente
            $mail->setFrom('ig@eye.lotomunir.com', '');

            // Conteúdo do e-mail
            $mail->isHTML(true);
            $mail->Subject = $assunto;

            foreach ($emails as $destinatario) {
                // Adiciona um destinatário
                $mail->clearAddresses();
                $mail->addAddress($destinatario);

                // Corpo do e-mail
                $mail->Body = '<!DOCTYPE html>
                <html>
                
                <head>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f4f4f4;
                            color: #333;
                            margin: 0;
                            padding: 0;
                        }
                        
                        .container {
                            max-width: 600px;
                            margin: 0 auto;
                            background-color: #f5f5f5;
                            padding: 20px;
                            border-radius: 5px;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        }
                        
                        header {
                            text-align: center;
                            margin-bottom: 20px;
                        }
                        
                        header img {
                            max-width: 100%;
                            height: auto;
                        }
                        
                        main {
                            margin-bottom: 20px;
                        }
                        
                        footer {
                            text-align: center;
                            color: #777;
                        }
                        
                        .logo {
                            text-align: center;
                        }
                        
                        .logo img {
                            margin-bottom: 10px;
                        }
                        
                        .txt-logo {
                            font-size: 20px;
                            color: #000000;
                            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                        }
                    </style>
                </head>
                
                <body>
                    <div class="container">
                        <div class="logo">
                            <img src="https://i.imgur.com/FSKQVll.png" alt="Logo da Igreja">
                            <p class="txt-logo">Igreja<br>Batista<br>Bethleem</p>
                        </div>
                        <main>
                           '.$msg.' 
                        </main>
                        <footer>
                            <p>Atenciosamente,<br>Seu Nome</p>
                        </footer>
                    </div>
                </body>
                
                </html>
            ';        
                // Envia o e-mail
                $mail->send();
            }

            return response()->json(['message' => 'E-mails enviados com sucesso','status' => true]);
            
        } catch (Exception $e) {
            //return response()->json(['error' => "Erro no envio do e-mail: {$mail->ErrorInfo}"], 500);
            return response()->json(['message' => "Erro no envio do e-mail: {$mail->ErrorInfo}",'status' => false]);

        }
    }
}

