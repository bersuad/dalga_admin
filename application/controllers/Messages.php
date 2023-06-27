<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends MY_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model([
            'Category_model',
            'Messages_model'
        ]);
	}

    public function replayMessage($id)
    {
        $message    = $this->input->post('messageReplay');
        $name    = $this->input->post('name');
        // echo $message; die();
        $message_data = array(
            'replied_message'       => $message,
            'view'                  => 1,
            'seen_by'               => 1,
            'replied_by'            => 1,
        );

        $result = $this->Messages_model->where("message_id", $id)->update($message_data);

        if($result){
            $this->session->set_flashdata('message', 'Message send to '.$name);
        }else{
            $this->session->set_flashdata('warning', 'Something went wrong');
        }
        redirect('/contact-message');
    }


    public function removeMessage($id)
    {
        
        $message_data = array(
            'message_status'       => 1,
        );

        $result = $this->Messages_model->where("message_id", $id)->update($message_data);

        if($result){
            $this->session->set_flashdata('error', 'You have removed messages');
        }else{
            $this->session->set_flashdata('warning', 'Something went wrong');
        }
        redirect('/contact-message');
    }

    public function orderMessage()
    {
        $message    = $this->input->post('messageReplay');
        $email    = $this->input->post('email');

        $info = $this->emailMessage($email, $message);
        
        if($info){
            $this->session->set_flashdata('message', 'Message send to '.$email);
        }else{
            $this->session->set_flashdata('warning', 'Something went wrong');
        }
        redirect('/orders');
    }


    public function emailMessage($email, $message)
    {
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://mail.kerezhi.net',
            'smtp_port' => 465,
            'smtp_user' => "contact@kerezhi.net",
            'smtp_pass' => "Contact123@kerezhi", 
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE,
            'newline'   => "\r\n",
        );

        $message ="
                    <html>
                    <head>
                        <title>Kerezhi USA LLC</title>
                    </head>
                    <body>
                        <div class='container'>
                            <div class='row'>
                                <div col-md-12>
                                    <header>
                                        <div style='background: #550000!important; color:#c96!important; min-height: 70px; vertical-align: middle; text-align: center;'>
                                            <h3 align='center' style='padding-top: 20px; margin-top: 5%;'>Kerezhi USA LLC.</h3>
                                        </div>
                                    </header>
                                </div>

                                <div class='col-md-12' style='padding-top: 10px;'>
                                    <div align='center'>
                                        <h3>Update on your order</h3>
                                        <p>".$message."</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <footer>
                            <div style='background: #550000!important; color:#c96!important;  min-height:50px; vertical-align: middle; text-align: center; padding-top: 10px; padding-bottom: 10px'>
                                <h4 align='center' >For further info we you can ask on info@kerezhius.com</h4>
                                <h6 align='center' >Kerezhi USA LLC</h6>
                            </div>
                        </footer>
                    </body>
                    </html>
                ";
        $this->load->library('email', $config);
        $this->email->from($config['smtp_user']);
        $this->email->to($email);
        $this->email->subject('Message from Kerezhi USA LLC');
        $this->email->message($message);
        $this->email->set_newline("\r\n");
        $email_result = $this->email->send();
        return $email_result;
    }
}