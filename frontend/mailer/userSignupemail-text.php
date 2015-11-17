<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
Hello <?= $user->email ?>,

Thank you for joining the service.
We hope you enjoy. If you have any inquiries, please feel free to contact us on the details below.

<p>Regards</p>
<p>DoneDeal Team</p>
<p>Email: help@donedeal.ug, Telephone: 0200 905 030 </p>
<img src="https://ci5.googleusercontent.com/proxy/Qtve9mw1vFQXy5RUfO7ZNRuRYXwcTkGIDFAMEeyj81jJutfRa_bbGBabEVEarNdmeUE=s0-d-e1-ft#http://donedeal.ug/email.png"/>
