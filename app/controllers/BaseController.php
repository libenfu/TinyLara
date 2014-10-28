<?php
/**
* \BaseController
*/
class BaseController {

  protected $view;
  protected $mail;

  public function __construct()
  {
  }

  public function __destruct()
  {
    // load view
    $view = $this->view;
    if ( $view instanceof View ) {
      extract($view->data);
      require $view->view;
    }

    // send mail
    $mail = $this->mail;
    if ( $mail instanceof Mail ) {
      $mailer = new Nette\Mail\SmtpMailer($mail->config);
      $mailer->send($mail);
    }
  }
}