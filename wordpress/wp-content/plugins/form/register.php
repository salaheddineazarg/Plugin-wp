<?php
/*
Plugin Name: Register
Description: Plugin de register users personnalisé pour WordPress
Version: 1.0
Author: Salaheddine
*/
function mon_plugin_activation()
{
  global $wpdb;
  $table_name = $wpdb->prefix . 'userActivated';

  $charset_collate = $wpdb->get_charset_collate();

  $query = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            firstname varchar(255) NOT NULL,
            lastname varchar(255) NOT NULL,
            email varchar(255) NOT NULL,
            password varchar(255) NOT NULL,
          
            date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY  (id)
        ) $charset_collate;";

  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
  dbDelta($query);
}
register_activation_hook(__FILE__, 'mon_plugin_activation');

// Fonction de désactivation du plugin
function mon_plugin_desactivation()
{
  global $wpdb;
  $table_name = $wpdb->prefix . 'userActivated';

  $wpdb->query("DROP TABLE IF EXISTS $table_name");
}
register_deactivation_hook(__FILE__, 'mon_plugin_desactivation');

// Fonction pour afficher le formulaire de register
function mon_plugin_shortcode_register()
{

  ?>
  <style>
    .form {
      background-color: #15172b;
      border-radius: 20px;
      box-sizing: border-box;
      height: 500px;
      padding: 20px;
      width: 380px;
      height: auto;
      margin: auto
    }

    .title {
      color: #eee;
      font-family: sans-serif;
      font-size: 36px;
      font-weight: 600;
      margin-top: 30px;
    }

    .subtitle {
      color: #eee;
      font-family: sans-serif;
      font-size: 16px;
      font-weight: 600;
      margin-top: 10px;
    }

    .input-container {
      height: 50px;
      position: relative;
      width: 100%;
    }

    .ic1 {
      margin-top: 40px;
    }

    .ic2 {
      margin-top: 30px;
    }

    .input {
      background-color: #303245;
      border-radius: 12px;
      border: 0;
      box-sizing: border-box;
      color: #eee;
      font-size: 18px;
      height: 100%;
      outline: 0;
      padding: 4px 20px 0;
      width: 100%;
    }

    .cut {
      background-color: #15172b;
      border-radius: 10px;
      height: 20px;
      left: 20px;
      position: absolute;
      top: -20px;
      transform: translateY(0);
      transition: transform 200ms;
      width: 76px;
    }

    .cut-short {
      width: 50px;
    }

    .input:focus~.cut,
    .input:not(:placeholder-shown)~.cut {
      transform: translateY(8px);
    }

    .placeholder {
      color: #65657b;
      font-family: sans-serif;
      left: 20px;
      line-height: 14px;
      pointer-events: none;
      position: absolute;
      transform-origin: 0 50%;
      transition: transform 200ms, color 200ms;
      top: 20px;
    }

    .input:focus~.placeholder,
    .input:not(:placeholder-shown)~.placeholder {
      transform: translateY(-30px) translateX(10px) scale(0.75);
    }

    .input:not(:placeholder-shown)~.placeholder {
      color: #808097;
    }

    .input:focus~.placeholder {
      color: #dc2f55;
    }

    .submit {
      background-color: #08d;
      border-radius: 12px;
      border: 0;
      box-sizing: border-box;
      color: #eee;
      cursor: pointer;
      font-size: 18px;
      height: 50px;
      margin-top: 38px;
      // outline: 0;
      text-align: center;
      width: 100%;
    }
    .hidden{
      display: none;
    }

    .submit:active {
      background-color: #06b;
    }
  </style>
   <script>
    window.addEventListener('load',()=>{
       const formHtml=localStorage.getItem('form')
     document.body.innerHTML += formHtml
    })
   

   </script>
   


  <?php

}
add_shortcode('mon_plugin_form_register', 'mon_plugin_shortcode_register');

function checkbox_form()
{
  ob_start();
  ?>
  <style>
    
 

     .container {
      width: 550px;
      padding: 25px 40px 25px 25px;
      border: 2px solid #fff;
      border-radius: 15px;
      text-align: center;
      color: white;
      margin:auto;
      background-color: #231557;
    }

    h2 {
      margin: 0;
      padding: 20px 0;
      font-size: 24px;
    }

    .row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 30px 0;
      font-size: 22px;

    }

    label {
      position: relative;
      width: 50px;
      height: 50px;
    }

    label span {
      display: block;
      width: 100%;
      height: 100%;
      position: absolute;
      border-radius: 6px;
      border: 3px solid #fff;
      cursor: pointer;
    }

    label span::after {
      content: "";
      position: absolute;
      width: 0px;
      height: 0px;
      left: 24px;
      bottom: 10px;
      border: solid #ddd;
      border-width: 0 6px 6px 0;
      transition: width 0.5s, height 0.5s, opacity 0.5s;
      transform: rotate(45deg);
      opacity: 0;
    }

    input:checked+span::after {
      width: 20px;
      height: 40px;
      opacity: 1;
    }

    input {
      width: 100%;
      height: 100%;
      position: absolute;
      opacity: 0;
    }

    .title {
      color: black;
      align-items: center;


      text-transform: uppercase;
      background-image: linear-gradient(-225deg,
          #231557 0%,
          #bc7bff 29%,
          #ff1361 67%,
          #fff800 100%);
      background-size: auto auto;
      background-clip: border-box;
      background-size: 200% auto;
      color: #fff;
      background-clip: text;
      text-fill-color: transparent;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      animation: textclip 4s ease-in infinite;


    }

    .submitadmin {
      background-color: #773cee;
      border-radius: 12px;
      border: 0;
      box-sizing: border-box;
      color: #eee;
      cursor: pointer;
      font-size: 18px;
      height: 50px;
      margin-top: 38px;
      outline: 0;
      text-align: center;
      width: 50%;
    }

    .submitadmin:active {
      background-color: #080f85;
    }

    @keyframes textclip {
      to {
        background-position: 200% center;
      }
    }
  </style>
 
    <div class="container">
      <h2 class="title">Admin Form</h2>
      <div class="row">
        <p>First name</p>
        <label>
          <input id="first_name" type="checkbox" />
          <span></span>
        </label>
      </div>
      <div class="row">
        <p>Last name</p>
        <label>
          <input id="last_name" type="checkbox" />
          <span></span>
        </label>
      </div>
      <div class="row">
        <p>Email</p>
        <label>
          <input id="email" type="checkbox" />
          <span></span>
        </label>
      </div>
      <div class="row">
        <p>Password
        </p>
        <label>
          <input id="password" type="checkbox" />
          <span></span>
        </label>
      </div>
      <button type="button" id="saveBtn" class="submitadmin">Save</button>
    </div>


  <script defer >
   



    const saveBtn = document.getElementById('saveBtn')
  
    var FirstName = document.getElementById('first_name');
    var LastName = document.getElementById('last_name')
    var Email = document.getElementById('email')
    var password = document.getElementById('password');

    saveBtn.addEventListener("click", () => {
      localStorage.removeItem('form')
      localStorage.clear();
      var formhome =document.createElement("form");
    
      formhome.classList.add('form')
      formhome.setAttribute('method', 'POST'); 
        formhome.setAttribute('action', "<?php echo esc_url(admin_url('admin-post.php?action=mon_plugin_register'))?>"); 
      
      formhome.innerHTML +='<div class="title">Welcome</div><div class="subtitle">Lets create your account!</div>'
        
       if(FirstName.checked === true ){  

        formhome.innerHTML += '<div class="input-container ic1"><input id="firstname" name="firstname" class="input" type="text" placeholder=" " /> <div class="cut"></div><label for="firstname" class="placeholder">First name</label> </div>'
      
       }else if(FirstName.checked === false){
        formhome.innerHTML += ''
       }
    

       if(LastName.checked === true ){
        formhome.innerHTML += '<div class="input-container ic1"><input id="lastname" name="lastname" class="input" type="text" placeholder=" " /> <div class="cut"></div><label for="lastname" class="placeholder">Last name</label> </div>'
       }else if(LastName.checked === false){
        formhome.innerHTML += ''
       }
      

       if(Email.checked === true ){
        formhome.innerHTML += '<div class="input-container ic1"><input id="email" name="email" class="input" type="email" placeholder=" " /> <div class="cut"></div><label for="email" class="placeholder">Email</label> </div>'
       }else if(Email.checked === false){
        formhome.innerHTML += ''
       }
  


       if(password.checked === true ){
        formhome.innerHTML += '<div class="input-container ic1"><input id="pasdword" name="password" class="input" type="password" placeholder=" " /> <div class="cut"></div><label for="password" class="placeholder">Password</label></div>'
       }else if(password.checked === false){
        formhome.innerHTML += ''
       }
       

          formhome.innerHTML += '<button type="submit" class="submit">submit</button>'
        
       
          localStorage.setItem('form',formhome.outerHTML)
         
        
    })
     

  </script>


  <?php

  return ob_get_clean();



}
add_shortcode('mon_plugin_form_admin', 'checkbox_form');




function mon_plugin_register()
{
  global $wpdb;
  $table_name = $wpdb->prefix . 'userActivated';


  $email = $_POST['email'];

  $password = $_POST['password'];
  $password = htmlspecialchars(trim(sha1($password)));


  if (isset($_POST['firstname'])) {
    $firstname = $_POST['firstname'];
  } else {
    $firstname = ' ';
  }
  if (isset($_POST['lastname'])) {
    $lastname = $_POST['lastname'];
  } else {
    $lastname = ' ';
  }

  $wpdb->insert(
    $table_name,
    array(
      'firstname' => $firstname,
      'lastname' => $lastname,
      'email' => $email,
      'password' => $password
    )
  );

  wp_redirect(home_url('/home'));
  exit;


}

add_action('admin_post_mon_plugin_register', 'mon_plugin_register');

?>