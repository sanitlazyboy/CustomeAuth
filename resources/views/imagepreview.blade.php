<script type="text/javascript">
  $(document).ready(function(){
      function previewImage(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function(e) {
                  $('#image-preview').attr('src', e.target.result);
                  $('#image-preview-container').show();
              }
              reader.readAsDataURL(input.files[0]);
          }
      }
      $('#image-file').change(function() {
          previewImage(this);
      });
  });
</script>