<?php
/**
 * Proyecto: Pixki
 * Nombre: email_config.php
 * Descripcion:
 *  La configuracion necesaria para poder mandar correos atraves de SendGrid
 *
 * Author: Edwin Jhovanny Salmeron Ibañez
 * Fecha: 06/02/2016
 * Tiempo: 10:24 AM
 * Creado usando: PhpStorm
 */
require "sendgrid-php/sendgrid-php.php";

class sgHelper
{
	/**
	 * @global $sgSender
	 *      Es el objecto que mandara el correo, en esta caso el correo es $sgEmail
	 * @uso
	 *      $sgSender->email("$sgEmail");
	 */

	private static $sgSender;

	/**
	 * @global $sgEmail
	 *      Es el objecto que se convertira en el correo y que sera enviado al destinatario
	 * @atributos
	 *      addTo()         - Aqui va el correo del destinatario
	 *      setFrom()       - Aqui va el correo del que envia
	 *      setFromName()   - Aqui va el nombre que se mostrara al llegar el correo (Opcional)
	 *      setSubject()    - Aqui va el tema del correo
	 *      setText()       - Aqui va el text crudo, en caso del que remitente no puede visualizar html (Opcional, Precuacion!)
	 *      setHtml()       - Aqui va el html con text
	 * @uso
	 *      $sgEmail
	 *          ->addTo("prueba@correo.com")
	 *          ->setFrom("remitente@correo.com")
	 *          ->setFromName("Remitente")
	 *          ->setSubject("Correo de Prueba")
	 *          ->setText("Mensaje de Prueba")
	 *          ->SetHtml("<h1>Mensaje de Prueba</h1>");
	 */

	private static $sgEmail;

    /**
     * @return SendGrid
     */
    public static function initializeSender()
	{
		self::$sgSender = new SendGrid('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');
		return self::$sgSender;
	}

    /**
     * @return \SendGrid\Email
     */
    public static function initializeEmail()
    {
        self::$sgEmail = new SendGrid\Email();
        return self::$sgEmail;
    }
}
?>
