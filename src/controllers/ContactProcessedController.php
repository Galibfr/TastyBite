<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContactProcessedController
{
    public function contactProcessed()
    {
        // Vérifier si le formulaire est soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            // Récupérer les données du formulaire
            $name = htmlspecialchars(trim($_POST['name']));
            $email = htmlspecialchars(trim($_POST['email']));
            $phone = htmlspecialchars(trim($_POST['phone']));
            $numberGuests = htmlspecialchars(trim($_POST['number-guests']));
            $date = htmlspecialchars(trim($_POST['date']));
            $time = htmlspecialchars(trim($_POST['time']));
            $message = htmlspecialchars(trim($_POST['message']));
            
            // Valider les données
            if (!empty($name) && !empty($email) && !empty($phone) && !empty($numberGuests) && !empty($date) && !empty($time) && !empty($message)) {
                
                // Configurer PHPMailer
                $mail = new PHPMailer(true);
                try {
                    // Configuration du serveur SMTP
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com'; 
                    $mail->SMTPAuth = true;
                    $mail->Username = 'mdgalibhossain001@gmail.com'; 
                    $mail->Password = 'hurm jbmm duiv efjq'; 
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;

                    // Paramètres de l'email
                    $mail->setFrom('mdgalibhossain001@gmail.com', 'Nom de votre restaurant');
                    $mail->addAddress('mdgalibhossain001@gmail.com');

                    // Contenu de l'email
                    $mail->isHTML(true);
                    $mail->Subject = 'Nouvelle réservation de table';
                    $mail->Body = "
                        <h2>Nouvelle demande de réservation</h2>
                        <p><strong>Nom:</strong> {$name}</p>
                        <p><strong>Email:</strong> {$email}</p>
                        <p><strong>Téléphone:</strong> {$phone}</p>
                        <p><strong>Nombre de personnes:</strong> {$numberGuests}</p>
                        <p><strong>Date de réservation:</strong> {$date}</p>
                        <p><strong>Heure:</strong> {$time}</p>
                        <p><strong>Message:</strong> {$message}</p>
                    ";

                    // Envoyer l'email
                    if ($mail->send()) {
                        echo "Votre réservation a été envoyée avec succès !";
                    } else {
                        echo "Erreur lors de l'envoi de la réservation.";
                    }
                } catch (Exception $e) {
                    echo "Erreur lors de l'envoi de l'email : {$mail->ErrorInfo}";
                }
            } else {
                echo "Tous les champs doivent être remplis.";
            }
        } else {
            echo "Erreur lors de la soumission du formulaire.";
        }
    }
}
