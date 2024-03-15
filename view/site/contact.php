<!DOCTYPE html>
<html lang="en">
<?php $title = "Liên hệ"; ?>
<?php include("layout/asset-header.php") ?>
<?php include("layout/header.php") ?>

<body id="contact-body">
  <style>
    #contact-body {
   
      margin: 0;
      padding: 0;
      background-color: #f8f9fa;
    }

    #contact-header {
      background-color: bisque;
      color: dimgrey;
      text-align: center;
      padding: 1em;
    }

    #contact-section {
      display: flex;
      justify-content: space-between;
      padding: 2em;
    }

    #contact-left {
      flex: 2;
      background-color: #f1f1f1;
      padding: 40px;
      border-radius: 10px;
    }

    #contact-right {
      flex: 3;
      margin-left: 2em;
    }

    #contact-right form {
      background-color: #f1f1f1;
      padding: 20px;
      border-radius: 10px;
    }

    #map-section {
      text-align: center;
      padding: 0px;
    }

    button {
      padding: 10px 20px;
      font-size: 16px;
      color: #fff;
      background-color: #ceae84;
      border: none;
      border-radius: 12px;
      cursor: pointer;
      transition: background-color 0.4s;
    }

    button:hover {
      background-color: #555843;
    }
  </style>
  <header id="contact-header">
    <h1>Contact Us</h1>
  </header>

  <div id="contact-section">
    <div id="contact-left">
      <h1 style="color: rgb(75, 75, 75);">Visit One Of Our Shop Contact Us Now</h1>
      <table class="table">
        <tbody>
          <tr>
            <th><a href="tel:0123456789"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
                  <path d="m20.487 17.14-4.065-3.696a1.001 1.001 0 0 0-1.391.043l-2.393 2.461c-.576-.11-1.734-.471-2.926-1.66-1.192-1.193-1.553-2.354-1.66-2.926l2.459-2.394a1 1 0 0 0 .043-1.391L6.859 3.513a1 1 0 0 0-1.391-.087l-2.17 1.861a1 1 0 0 0-.29.649c-.015.25-.301 6.172 4.291 10.766C11.305 20.707 16.323 21 17.705 21c.202 0 .326-.006.359-.008a.992.992 0 0 0 .648-.291l1.86-2.171a.997.997 0 0 0-.085-1.39z"></path>
                </svg></a></th>
            <td><a href="tel:0123456789" style="color: #555843; font-size: 24px;">Phone: 0123456789</a></td>
          </tr>
          <tr>
            <th><a href="mailto:info@example.com"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
                  <path d="m18.73 5.41-1.28 1L12 10.46 6.55 6.37l-1.28-1A2 2 0 0 0 2 7.05v11.59A1.36 1.36 0 0 0 3.36 20h3.19v-7.72L12 16.37l5.45-4.09V20h3.19A1.36 1.36 0 0 0 22 18.64V7.05a2 2 0 0 0-3.27-1.64z"></path>
                </svg></a></th>
            <td><a href="mailto:info@example.com" style="color: #555843; font-size: 24px;">Email: info@example.com</a></td>
          </tr>
          <tr>
            <th><a><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
                  <path d="M12 2C7.589 2 4 5.589 4 9.995 3.971 16.44 11.696 21.784 12 22c0 0 8.029-5.56 8-12 0-4.411-3.589-8-8-8zm0 12c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4z"></path>
                </svg></a></th>
            <td style="color: #555843; font-size: 20px;">Số 55 Giải Phóng, Đồng Tâm, Hai Bà Trừng, Hà Nội.</td>
          </tr>
          <tr>
            <th scope="row"></th>
            <td>
              <a href="https://www.facebook.com/" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" style="fill: #39A7FF;">
                  <path d="M12.001 2.002c-5.522 0-9.999 4.477-9.999 9.999 0 4.99 3.656 9.126 8.437 9.879v-6.988h-2.54v-2.891h2.54V9.798c0-2.508 1.493-3.891 3.776-3.891 1.094 0 2.24.195 2.24.195v2.459h-1.264c-1.24 0-1.628.772-1.628 1.563v1.875h2.771l-.443 2.891h-2.328v6.988C18.344 21.129 22 16.992 22 12.001c0-5.522-4.477-9.999-9.999-9.999z"></path>
                </svg></a>
              <a href="https://www.instagram.com/" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" style="fill: rgb(232, 69, 69);">
                  <path d="M11.999 7.377a4.623 4.623 0 1 0 0 9.248 4.623 4.623 0 0 0 0-9.248zm0 7.627a3.004 3.004 0 1 1 0-6.008 3.004 3.004 0 0 1 0 6.008z"></path>
                  <circle cx="16.806" cy="7.207" r="1.078"></circle>
                  <path d="M20.533 6.111A4.605 4.605 0 0 0 17.9 3.479a6.606 6.606 0 0 0-2.186-.42c-.963-.042-1.268-.054-3.71-.054s-2.755 0-3.71.054a6.554 6.554 0 0 0-2.184.42 4.6 4.6 0 0 0-2.633 2.632 6.585 6.585 0 0 0-.419 2.186c-.043.962-.056 1.267-.056 3.71 0 2.442 0 2.753.056 3.71.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.584 6.584 0 0 0 2.185.45c.963.042 1.268.055 3.71.055s2.755 0 3.71-.055a6.615 6.615 0 0 0 2.186-.419 4.613 4.613 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.186.043-.962.056-1.267.056-3.71s0-2.753-.056-3.71a6.581 6.581 0 0 0-.421-2.217zm-1.218 9.532a5.043 5.043 0 0 1-.311 1.688 2.987 2.987 0 0 1-1.712 1.711 4.985 4.985 0 0 1-1.67.311c-.95.044-1.218.055-3.654.055-2.438 0-2.687 0-3.655-.055a4.96 4.96 0 0 1-1.669-.311 2.985 2.985 0 0 1-1.719-1.711 5.08 5.08 0 0 1-.311-1.669c-.043-.95-.053-1.218-.053-3.654 0-2.437 0-2.686.053-3.655a5.038 5.038 0 0 1 .311-1.687c.305-.789.93-1.41 1.719-1.712a5.01 5.01 0 0 1 1.669-.311c.951-.043 1.218-.055 3.655-.055s2.687 0 3.654.055a4.96 4.96 0 0 1 1.67.311 2.991 2.991 0 0 1 1.712 1.712 5.08 5.08 0 0 1 .311 1.669c.043.951.054 1.218.054 3.655 0 2.436 0 2.698-.043 3.654h-.011z"></path>
                </svg></a>
              <a href="https://www.twitter.com/" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" style="fill: #47bac7;">
                  <path d="M19.633 7.997c.013.175.013.349.013.523 0 5.325-4.053 11.461-11.46 11.461-2.282 0-4.402-.661-6.186-1.809.324.037.636.05.973.05a8.07 8.07 0 0 0 5.001-1.721 4.036 4.036 0 0 1-3.767-2.793c.249.037.499.062.761.062.361 0 .724-.05 1.061-.137a4.027 4.027 0 0 1-3.23-3.953v-.05c.537.299 1.16.486 1.82.511a4.022 4.022 0 0 1-1.796-3.354c0-.748.199-1.434.548-2.032a11.457 11.457 0 0 0 8.306 4.215c-.062-.3-.1-.611-.1-.923a4.026 4.026 0 0 1 4.028-4.028c1.16 0 2.207.486 2.943 1.272a7.957 7.957 0 0 0 2.556-.973 4.02 4.02 0 0 1-1.771 2.22 8.073 8.073 0 0 0 2.319-.624 8.645 8.645 0 0 1-2.019 2.083z"></path>
                </svg></a>
              <a href="https://www.youtube.com/" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" style="fill: rgb(222, 55, 55);">
                  <path d="M21.593 7.203a2.506 2.506 0 0 0-1.762-1.766C18.265 5.007 12 5 12 5s-6.264-.007-7.831.404a2.56 2.56 0 0 0-1.766 1.778c-.413 1.566-.417 4.814-.417 4.814s-.004 3.264.406 4.814c.23.857.905 1.534 1.763 1.765 1.582.43 7.83.437 7.83.437s6.265.007 7.831-.403a2.515 2.515 0 0 0 1.767-1.763c.414-1.565.417-4.812.417-4.812s.02-3.265-.407-4.831zM9.996 15.005l.005-6 5.207 3.005-5.212 2.995z"></path>
                </svg></a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="container mt-3" id="contact-right">
      <h1 style="color: rgb(75, 75, 75);">Leave a Message</h1>
      <form>
        <div class="form-floating mb-3 mt-3">
          <input type="text" class="form-control" name="text" id="name" placeholder="Name*"></input>
          <label for="name">Name*</label>
        </div>

        <div class="form-floating mb-3 mt-3">
          <input type="email" class="form-control" id="email" name="email" placeholder="Email*"></input>
          <label for="email">Email*</label>
        </div>

        <div class="form-floating mb-3 mt-3">
          <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject*">
          <label for="subject">Subject*</label>
        </div>

        <div class="form-group">
          <label for="feedback">Your Messgae:</label>
          <textarea class="form-control" id="feedback" name="feedback" rows="6" required></textarea>

        </div>

        <button type="submit">SEND MESSAGE</button>
      </form>
    </div>
  </div>

  <div id="map-section">
    <h1 style="color: #F3B664; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">MIOCA</h1><br></br>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.7334696247503!2d105.84074577538748!3d21.003318488651573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac773026b415%3A0x499b8b613889f78a!2zVHLGsOG7nW5nIMSQ4bqhaSBI4buNYyBYw6J5IEThu7FuZyBIw6AgTuG7mWkgLSBIVUNF!5e0!3m2!1svi!2s!4v1699605490235!5m2!1svi!2s" width="100%" height="600px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>

  <?php include("layout/footer.php") ?>
    <?php include("layout/asset-footer.php") ?>
</body>
</html>