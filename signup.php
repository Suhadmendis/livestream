<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">



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
</style>


</head>
<body>
    


    <div class="bga">

        <section class="text-gray-700 body-font">
            <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
                <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
                    <h1 class="title-font font-medium text-3xl text-gray-900">Evidence based management of HR+ Advance Breast Cancer</h1>
                    <p class="leading-relaxed mt-4">Poke slow-carb mixtape knausgaard, typewriter street art gentrify hammock
                        starladder roathse. Craies vegan tousled etsy austin.</p>
                </div>
                <div class="lg:w-2/6 md:w-1/2 bg-gray-200 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
                    <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Sign Up</h2>
                    <input
                        id="full_name"
                        class="bg-white rounded border border-gray-400 focus:outline-none focus:border-indigo-500 text-base px-4 py-2 mb-4"
                        placeholder="Full Name" type="text">
                    <input
                        id="email"
                        class="bg-white rounded border border-gray-400 focus:outline-none focus:border-indigo-500 text-base px-4 py-2 mb-4"
                        placeholder="Email" type="email">

                    <input
                        id="pass"
                        class="bg-white rounded border border-gray-400 focus:outline-none focus:border-indigo-500 text-base px-4 py-2 mb-4"
                        placeholder="New Password" type="text">
                    
                    <input
                        id="uniq_id"
                        class="bg-white rounded border border-gray-400 focus:outline-none focus:border-indigo-500 text-base px-4 py-2 mb-4"
                        placeholder="ID" type="text">
                    <button onClick="save_inv();"
                        class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Register</button>
                    <p class="text-xs text-gray-500 mt-3">Already have an account? <a href="index.php">Sign in Here</a></p>
                </div>
            </div>
        </section>

    </div>


<script src="_js/create_user.js"></script>


</body>
</html>