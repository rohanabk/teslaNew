<?php
  include 'db_connect.php';

  function Validate($data)
  {
     $data= trim($data);
     $data = stripslashes($data);
     $data=htmlspecialchars($data);

     return $data;
  }
  $firstName=Validate($_POST['fname']);
  $lastName=Validate($_POST['lname']);
  $usn=Validate($_POST['usn']);
  $cname=Validate($_POST['cname']);
  $mobile=Validate($_POST['mobile']);
  $email=Validate($_POST['email']);
  $receipt = "TES".mt_rand(1111,9999);
  $query = "INSERT INTO register(receipt,firstName,lastName,usn,cname,mobile,email)
   VALUES('".$receipt."','".$firstName."','".$lastName."','".$usn."','".$cname."','".$mobile."','".$email."')";
mysqli_query($connection,$query);
// header("registration.html");
?>
<html>

<head>
  <title>Transaction Receipt</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <style>
  body{
    background-image:url("electricity.jpg");
  }
    .invoice-box {
      background: #fff;
       max-width: 500px;
       margin: auto;
       padding: 30px;
       border: 1px solid #eee;
       box-shadow: 0 0 10px rgba(0, 0, 0, .15);
       font-size: 16px;
       line-height: 24px;
       font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
       color: #555;
   }

   .invoice-box table {
       width: 100%;
       line-height: inherit;
       text-align: left;
   }

   .invoice-box table td {
       padding: 5px;
       vertical-align: top;
   }

   .invoice-box table tr td:nth-child(2) {
       text-align: right;
   }

   .invoice-box table tr.top table td {
       padding-bottom: 20px;
   }

   .invoice-box table tr.top table td.title {
       font-size: 45px;
       /* line-height: 45px; */
       color: #333;
   }

   .invoice-box table tr.information table td {
       padding-bottom: 40px;
   }

   .invoice-box table tr.heading td {
       background: #eee;
       border-bottom: 1px solid #ddd;
       font-weight: bold;
   }

   .invoice-box table tr.details td {
       padding-bottom: 20px;
   }

   .invoice-box table tr.item td{
       border-bottom: 1px solid #eee;
   }

   .invoice-box table tr.item.last td {
       border-bottom: none;
   }

   .invoice-box table tr.total td:nth-child(2) {
       border-top: 2px solid #eee;
       font-weight: bold;
   }

   @media only screen and (max-width: 600px) {
       .invoice-box table tr.top table td {
           width: 100%;
           display: block;
           text-align: center;
       }

       .invoice-box table tr.information table td {
           width: 100%;
           display: block;
           text-align: center;
       }
   }

   /** RTL **/
   .rtl {
       direction: rtl;
       font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
   }

   .rtl table {
       text-align: right;
   }

   .rtl table tr td:nth-child(2) {
       text-align: left;
   }
    </style>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
</head>


<body>

  <form class="form container" style="max-width: none;margin-top: 20px;width:500px;">
    <div class="invoice-box">
      <table cellpadding="0" cellspacing="0">
        <tr class="top">
          <td colspan="2">
            <table>
              <tr>
                <td class="title">
                  <span>TESLA</span>
                  <!-- <img src="https://www.sparksuite.com/images/logo.png" style="width:100%; max-width:300px;"> -->
                </td>

                <td>
                  Receipt no.: <?php print $receipt;  ?><br>
                  Date : <?php print date("d/m h:i:s A"); ?>
                </td>
              </tr>
            </table>
          </td>
        </tr>

        <tr class="information">
          <td colspan="2">
            <table>
              <tr>
                <td>
                  Gogte Institute of Technology<br>
                  Udyambag<br>
                  Belgaum
                </td>


              </tr>
            </table>
          </td>
        </tr>

        <tr class="item">
          <td>
            Name : <?php print $firstName." ".$lastName;  ?>
          </td>


        </tr>

        <tr class="item">
          <td>
            USN : <?php print $usn; ?>
          </td>


        </tr>
        <tr class="item">
          <td>
            College : <?php print $cname; ?>
          </td>


        </tr>
        <tr class="item">
          <td>
            Email address: <?php print $email; ?>
          </td>


        </tr>
        <tr class="item">
          <td>
            Contact No. : <?php print $mobile; ?>
          </td>


        </tr>
      </table>
    </div>
  </form>

  <input type="button" class="btn btn-secondary" id="create_pdf" value="Download Receipt">
  <a href="event.php" class="btn btn-light">Events</a>
</body>

</html>
<script>
  (function() {
    var
      form = $('.form'),
      cache_width = form.width(),
      a4 = [595.28, 841.89]; // for a4 size paper width and height

    $('#create_pdf').on('click', function() {
      $('body').scrollTop(0);
      createPDF();
    });
    //create pdf
    function createPDF() {
      getCanvas().then(function(canvas) {
        var
          img = canvas.toDataURL("image/png"),
          doc = new jsPDF({
            unit: 'px',
            format: 'a4'
          });
        doc.addImage(img, 'JPEG', 20, 20);
        doc.save('TESLA receipt.pdf');
        form.width(cache_width);
      });
    }

    // create canvas object
    function getCanvas() {
      form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');
      return html2canvas(form, {
        imageTimeout: 2000,
        removeContainer: true
      });
    }

  }());
</script>
<script>
  /*
   * jQuery helper plugin for examples and tests
   */
  (function($) {
    $.fn.html2canvas = function(options) {
      var date = new Date(),
        $message = null,
        timeoutTimer = false,
        timer = date.getTime();
      html2canvas.logging = options && options.logging;
      html2canvas.Preload(this[0], $.extend({
        complete: function(images) {
          var queue = html2canvas.Parse(this[0], images, options),
            $canvas = $(html2canvas.Renderer(queue, options)),
            finishTime = new Date();

          $canvas.css({
            position: 'absolute',
            left: 0,
            top: 0
          }).appendTo(document.body);
          $canvas.siblings().toggle();

          $(window).click(function() {
            if (!$canvas.is(':visible')) {
              $canvas.toggle().siblings().toggle();
              throwMessage("Canvas Render visible");
            } else {
              $canvas.siblings().toggle();
              $canvas.toggle();
              throwMessage("Canvas Render hidden");
            }
          });
          throwMessage('Screenshot created in ' + ((finishTime.getTime() - timer) / 1000) + " seconds<br />", 4000);
        }
      }, options));

      function throwMessage(msg, duration) {
        window.clearTimeout(timeoutTimer);
        timeoutTimer = window.setTimeout(function() {
          $message.fadeOut(function() {
            $message.remove();
          });
        }, duration || 2000);
        if ($message)
          $message.remove();
        $message = $('<div ></div>').html(msg).css({
          margin: 0,
          padding: 10,
          background: "#000",
          opacity: 0.7,
          position: "fixed",
          top: 10,
          right: 10,
          fontFamily: 'Tahoma',
          color: '#fff',
          fontSize: 12,
          borderRadius: 12,
          width: 'auto',
          height: 'auto',
          textAlign: 'center',
          textDecoration: 'none'
        }).hide().fadeIn().appendTo('body');
      }
    };
  })(jQuery);
</script>
