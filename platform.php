<?php
session_start();

if (isset($_SESSION['CURRENT_USER'])) {
    
}else{
    header('Location: ' . "index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">

    <style>
body, html {
  height: 100%;
  margin: 0;
}

.bg {
  /* The image used */
  background-image: url("bg.jpg");

  /* Full height */
  

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* .text-gray-500{
    color: white;
}
.text-gray-900{
    color: white;
}
.text-gray-600{
    color: #cacaca;
} */

</style>


</head>
<body>
    

<header class="text-gray-700 body-font">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
    <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
      <img width="180" src="Logo_page_01.jpg" alt="">
      
    </a>
    <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
      <a class="mr-5 hover:text-gray-900"><b><?php echo $_SESSION['CURRENT_USER']; ?></b></a>
      
    </nav>
    <!-- <button onClick="logout();" class="inline-flex items-center bg-gray-200 border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-4 md:mt-0">Logout
      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
        <path d="M5 12h14M12 5l7 7-7 7"></path>
      </svg>
    </button> -->
  </div>
</header>
    


<section class="text-gray-700 body-font" id="video-section">
  <div class="container mx-auto flex px-5 py-20 items-center justify-center flex-col" style="padding-top: 2rem;">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white" style="text-align: center;">Evidence based management of <br>HR+ Advance Breast Cancer</h1>
    <iframe src="https://video.ibm.com/embed/23951896" style="border: 0;" webkitallowfullscreen allowfullscreen frameborder="no" width="600" height="350"></iframe>
    <div class="text-center lg:w-2/3 w-full">
      <br>
      <!-- <p class="mb-8 leading-relaxed">Meggings kinfolk echo park stumptown DIY, kale chips beard jianbing tousled. Chambray dreamcatcher trust fund, kitsch vice godard disrupt ramps hexagon mustache umami snackwave tilde chillwave ugh. Pour-over meditation PBR&amp;B pickled ennui celiac mlkshk freegan photo booth af fingerstache pitchfork.</p> -->
      <div class="flex justify-center">
        <!-- <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Button</button>
        <button class="ml-4 inline-flex text-gray-700 bg-gray-200 border-0 py-2 px-6 focus:outline-none hover:bg-gray-300 rounded text-lg">Button</button> -->
      </div>
    </div>
  </div>
</section>


    <footer class="text-gray-700 body-font" >
  <div style="padding-top: 2rem;padding-bottom: 2rem;" class="container px-5 py-20 mx-auto flex md:items-center lg:items-start md:flex-row md:flex-no-wrap flex-wrap flex-col">
    <div class="w-64 flex-shrink-0 md:mx-0 mx-auto text-center md:text-left">

      <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900" style="">
        <img width="150" src="Logo_page_03.jpg" alt="">
      </a>


      <!-- <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
        <img width="160" src="Logo_page_01.jpg" alt="">
      </a> -->

      <!-- <p class="mt-2 text-sm text-gray-500 footer-text-color">Air plant banjo lyft occupy retro adaptogen indego</p> -->
    </div>
    <div class="flex-grow flex flex-wrap md:pl-20 -mb-10 md:mt-0 mt-10 md:text-left text-center">
      <div class="lg:w-1/3 md:w-1/3 px-4">
        <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3 footer-text-color">&nbsp;</h2>
        <!-- <nav class="list-none mb-10">
          <li>
            <a class="text-gray-600 hover:text-gray-800">Dr.Jayantha Balawardane</a>
          </li>
          <li>
            <a class="text-gray-600 hover:text-gray-800">MBBS (Col).MD(Col),FRCP(Edin),FRCP(Land)</a>
          </li>
          <li>
            <a class="text-gray-600 hover:text-gray-800">Sebior Consultant Oncologist,</a>
          </li>
          <li>
            <a class="text-gray-600 hover:text-gray-800">Kothalawla Defense University,</a>
          </li>
          <li>
            <a class="text-gray-600 hover:text-gray-800">Sri Lanka.</a>
          </li>
        </nav> -->
      </div>
      
      <div class="lg:w-1/3 md:w-1/3  px-4">
        <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3 footer-text-color">&nbsp;</h2>
        <nav class="list-none mb-10">
            <!-- <li>
                <a class="text-gray-600 hover:text-gray-800">Prof.Shaheenah Dawood</a>
            </li>
            <li>
                <a class="text-gray-600 hover:text-gray-800">MBBCH,FACP,FRCP(Glasgow),MPH,CPH</a>
            </li>
            <li>
                <a class="text-gray-600 hover:text-gray-800">Assoc.Professor of Clinical Oncology</a>
            </li>
            <li>
                <a class="text-gray-600 hover:text-gray-800">Mediclinic City Hospital - North Wing</a>
            </li>
            <li>
                <a class="text-gray-600 hover:text-gray-800">Dubai Health Care City</a>
            </li>
            <li>
                <a class="text-gray-600 hover:text-gray-800">Dubai UAE</a>
            </li> -->
        </nav>
      </div>
      <div class="lg:w-1/3 md:w-1/3 px-4">
        <!-- <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3 footer-text-color">&nbsp;</h2> -->
        <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0"><p style="font-size: 13px;margin-left: 50px;">Powered By</p>
            <img width="100" src="img/tallees.PNG" alt="" style="margin-left: 20px;">
            
            </a>

            <br>
        <!-- <nav class="list-none mb-10">
            <li>
                <a class="text-gray-600 hover:text-gray-800">DR.Sumitha Pieris</a>
            </li>
            <li>
                <a class="text-gray-600 hover:text-gray-800">MBBS (USJP),MD(Col)</a>
            </li>
            <li>
                <a class="text-gray-600 hover:text-gray-800">Consultant Oncologist,</a>
            </li>
            <li>
                <a class="text-gray-600 hover:text-gray-800">Provincial General Hospital,</a>
            </li>
            <li>
                <a class="text-gray-600 hover:text-gray-800">Rathnapura,</a>
            </li>
            <li>
                <a class="text-gray-600 hover:text-gray-800">Sri Lanka.</a>
            </li>
        </nav> -->
      </div>
    </div>
  </div>
<div class="footer-back-color" style="background-color: #61276f;">
    <div class="container mx-auto py-2 px-5 flex flex-wrap flex-col sm:flex-row">
      <p class="text-color text-sm text-center sm:text-left" style="font-size: 13px;margin-left: 20px;">@Tallees 2020
        <!-- <a href="https://twitter.com/knyttneve" rel="noopener noreferrer" class="text-color ml-1" target="_blank">@knyttneve</a> -->
      </p>
      <!-- <span class="inline-flex sm:ml-auto sm:mt-0 mt-2 justify-center sm:justify-start">
        <a class="text-color">
          <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
          </svg>
        </a>
        <a class="ml-3 text-color">
          <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
            <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
          </svg>
        </a>
        <a class="ml-3 text-color">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
          </svg>
        </a>
        <a class="ml-3 text-color">
          <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
            <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
            <circle cx="4" cy="4" r="2" stroke="none"></circle>
          </svg>
        </a>
      </span> -->
    </div>
  </div>
</footer>

<script src="_js/user.js"></script>

</body>
</html>