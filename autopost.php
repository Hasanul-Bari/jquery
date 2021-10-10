<!DOCTYPE html>
<html>

  <head>
    <script type="text/javascript" src="jquery-3.5.1.min.js">
    </script>
  </head>


  <body>
    <p>Change the contents of the text field and then tab away from the field to trigger the change event.
      Do not use Enter or the form will get submitted.</p>

      <form id="target">
          <input type="text" name="one" value="Hello there" style="vertical-align: middle;">
          <img id="spinner" src="spinner.gif" height="25" style="vertical-align: middle; display:none;">
      </form>

      <hr>
      <div id="result"></div>
      <hr>



      <script type="text/javascript">
          $('#target').change(function(event) {
            //  event.preventDefault();

              $('#spinner').show();

              var form= $('#target');
              var txt= form.find('input[name="one"]').val();

              console.log('Sending POST');

                $.post('autoecho.php', {'val': txt},
                        function(data) {
                            console.log(data);
                            $('#result').empty().append(data);
                            $('#spinner').hide();
                        }

                      ).fail( function(){
                        $('#target').css('background-color', 'red');
                        alert("Dang!");
                      });

              //return false;

          });

      </script>

  </body>
</html>
