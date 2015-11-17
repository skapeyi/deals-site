<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
Hello Adminstrator,

A new user (<?= $user->email ?> has joined the service.
Please check the user dashboard for details.

<p>Regards</p>
<p>DoneDeal Team</p>
<p>Email: help@donedeal.ug, Telephone: 0200 905 030 </p>
<img src="https://ci5.googleusercontent.com/proxy/Qtve9mw1vFQXy5RUfO7ZNRuRYXwcTkGIDFAMEeyj81jJutfRa_bbGBabEVEarNdmeUE=s0-d-e1-ft#http://donedeal.ug/email.png"/>
