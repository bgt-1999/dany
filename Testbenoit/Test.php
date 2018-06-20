<?php

$isEmailSent = "";

if (count($_POST) !== 0 && !is_null($_POST)) {
    $isEmailSent =<<<HTML
            <div class="col-sm-12 alert alert-danger alert-dismissible show">
                <span>Erreur, votre email n'a pas pu être envoyé, veuillez réessayer plus tard</span>
            </div>
HTML;
    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['telephone']) &&
        isset($_POST['email']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['cp']) &&
        !is_null($_POST['nom']) && !is_null($_POST['prenom']) && !is_null($_POST['telephone']) &&
        !is_null($_POST['email']) && !is_null($_POST['adresse']) && !is_null($_POST['ville']) && !is_null($_POST['cp'])) {

        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587,'tls'))
            ->setUsername('')
            ->setPassword('');
        $mailer = new Swift_Mailer($transport);

        $message = (new Swift_Message($_POST['subject']))
            ->setFrom($_POST['email'])
            ->setTo('')
            ->setBody($_POST['message'])
            ;

        $mailer->send($message);

        $isEmailSent =<<<HTML
    <div class="col-sm-12 alert alert-success alert-dismissible show">
        <span>L'email a bien été envoyé, nous vous répondrons dans les plus brefs délais</span>
    </div>
HTML;

    }
}

$html =<<<HTML
            <main role="main" class="inner cover">
                <div class="jumbotron jumbotron-fluid ">
                </div>

                <div class="jumbotron jumbotron-fluid ">
                    <div class="container">
                        <h1 class="display-4">Nous contacter / commander</h1>
                
                        {$isEmailSent}
                        <form method="post" action="Test.php">
                            <div class="form-row container">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="lastname" placeholder="Nom" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="firstname" placeholder="Prénom" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <input class="form-control" type="email" name="email" placeholder="Adresse email" required>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control" name="phone" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" placeholder="Téléphone" required>
                                </div>
                                <div class="form-group col-md-2 col-sm-4">
                                    <input type="text" class="form-control" name="number" pattern="[0-9]{1,4}"  placeholder="N°">
                                </div>
                                <div class="form-group col-md-10 col-sm-8">
                                    <input type="text" class="form-control" name="adress" placeholder="Adresse" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="city" placeholder="Ville" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="postcode" pattern="[0-9]{5}" placeholder="Code postal" required>
                                </div>
                                <div class="form-group col-sm-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Sujet" required>
                                </div>
                                <div class="form-group col-sm-12">
                                    <textarea class="form-control" name="message" placeholder="Pourquoi souhaitez-vous nous contacter ?" required></textarea>
                                </div>
                            </div>
                            <div class="container col-sm-12 text-center">
                                <button class="btn btn-primary" type="submit">Contacter l'entreprise <i class="fas fa-paper-plane"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
  
            <script type="text/javascript">
                let countArticles = 0;
            
                if (localStorage.getItem('shopping-cart') === null || localStorage.getItem('shopping-cart') === undefined) {
                    localStorage.setItem('shopping-cart', JSON.stringify([]));
                }
                else {
                    JSON.parse(localStorage.getItem('shopping-cart')).map((article) => {
                        article.volumes.map((volume) => {
                            countArticles += volume.quantity;
                        });
                    })
                }
                $('#shopping-cart').text(countArticles);
            </script>
    </body>
</html>
HTML;


echo $html;
?>