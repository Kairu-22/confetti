<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
  <!-- <canvas id="tsparticles"></canvas> -->

  <div class="popup-screen">
    <div id="confetti"></div>
    <div class="popup-box">
      <i class="fas fa-times close-btn"></i>
    </div>
  </div>
  </div>
  <section class="home">
    <div class="image">
      <img src="image.webp" alt="">
    </div>
    <div class="info">
      <h2> Happy Birthday!!</h2>
      <p>Happy birthday to our beloved {{name}}! We hope you have a wonderful day today.</p>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla repudiandae ad sint autem atque, neque omnis.
        Ea harum nobis corporis at velit dolorem, a aut atque eaque laborum dicta nihil nesciunt, ipsam beatae culpa.
        Explicabo aliquid soluta, voluptatibus voluptates ipsa corporis aperiam repellendus autem maiores, possimus
        consequatur rerum aliquam impedit recusandae magni ullam. Ad sed repellendus obcaecati fugiat. Ipsa excepturi
        temporibus voluptates, vel obcaecati repellendus rem facere vitae, amet nostrum harum! Distinctio ducimus at,
        unde eos commodi minus aut quasi eligendi, eaque autem officiis nisi dignissimos dolor, ut provident fugiat
        vitae reprehenderit in enim quibusdam voluptates! Placeat velit saepe dolorum.</p>
    </div>
  </section>

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tsparticles/2.12.0/tsparticles.bundle.min.js" integrity="sha512-W/UhCgUnBrqWd6HtR1wS+twNkVYvwxB1Hqtm9d/0HOWynEcr7t1BOQn1x55ziHQJtn+tU0Fzih1SAawRr6YFmA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tsparticles/2.12.0/tsparticles.min.js" integrity="sha512-FHiQ+rxWkSr6gm031s3n/wCpTtTjbjpug1uqtFVDYxsGLP5jSNQrBkta29CrSAqrVSTt6eQhwGBU9DHmY80tDA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/tsparticles-confetti@2.12.0/tsparticles.confetti.bundle.min.js"></script>

  <script type="text/javascript">
    function startconfetti() {
      const duration = 15 * 1000,
        animationEnd = Date.now() + duration,
        defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 0 };

      function randomInRange(min, max) {
        return Math.random() * (max - min) + min;
      }

      const interval = setInterval(function () {
        const timeLeft = animationEnd - Date.now();

        if (timeLeft <= 0) {
          return clearInterval(interval);
        }

        const particleCount = 20 * (timeLeft / duration);

        // since particles fall down, start a bit higher than random
        confetti(
          Object.assign({}, defaults, {
            particleCount,
            origin: { x: randomInRange(0.1, 0.3), y: Math.random() - 0.2 },
          })
        );
        confetti(
          Object.assign({}, defaults, {
            particleCount,
            origin: { x: randomInRange(0.7, 0.9), y: Math.random() - 0.2 },
          })
        );
      }, 250);
    }
  </script>


  <script type="text/javascript">
    const popupScreen = document.querySelector(".popup-screen");
    const popupBox = document.querySelector(".popup-box");
    const closeBtn = document.querySelector(".close-btn");


    window.addEventListener("load", () => {

      fetch('getbday.php')
        .then(response => response.json())
        .then(data => {
          // Check if data is not empty
          if (data.length > 0){
          popupScreen.classList.add("active");
          startconfetti()
            var name = extractValuesByKey(data, "name");
          const allNames = name.join(', ');
          // console.log(allNames);
          var picLink = extractValuesByKey(data, "picture_link");
          // var alllinks = picLink.join('');
          var imgtag = "";
          for (let j = 0; j < picLink.length; j++) {
            imgtag += '<img src=' + picLink[j] + '>';
          }
          // for (let i = 0; i < data.length; i++)
          {
            popupBox.insertAdjacentHTML("beforeend",
              ` 
            <h2 id="birthdayName" >Happy Birthday <br> To <br> ${allNames}!!</h2>
            <p style="text-align:center">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem, nam!</p>
            <div class="image">
             ${imgtag} </div>`)
            // document.getElementById('birthdayName').innerText = `Happy Birthday, ${data[0].name}!`;
            // document.getElementById('birthdayImage').src = data[0].picture_link;
          }
          // console.log(data)
        }})


        .catch(error => console.error('Error fetching data:', error));

      function extractValuesByKey(data, key) {
        const values = [];
        for (let i = 0; i < data.length; i++) {
          values.push(data[i][key]);
        }
        return values;
      }
      //popup appers after 2s after loading.
    });


    closeBtn.addEventListener("click", () => {
      popupScreen.classList.remove("active");//close the popup on clicking the close button
      setTimeout(() => {
        popupScreen.style.display = "none";
      }, 500);
    })
  </script>

</body>

</html>