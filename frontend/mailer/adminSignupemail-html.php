<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>Hello Administrator,</p>

    <p>Yeah, A new user( <?= Html::encode($user->email) ?> )  has joined the service. <br/> Check the User Dashboard for User Details </p>

    <p>Regards</p>
    <p>DoneDeal  Team <br /> Email: help@donedeal.ug, Telephone: 0200 905 030 <br /></p>
    <img src="https://ci5.googleusercontent.com/proxy/Qtve9mw1vFQXy5RUfO7ZNRuRYXwcTkGIDFAMEeyj81jJutfRa_bbGBabEVEarNdmeUE=s0-d-e1-ft#http://donedeal.ug/email.png"/>

</div>
