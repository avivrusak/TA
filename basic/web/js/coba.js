$('select#drop-komplek').on('change',function(){
        var idKomplek = $(this).val();
        // console.log('haha');
        $.ajax({
          type: "POST",
          url: '/data-makam/getBlok',
          data: { 
            // mail: $('input[name="mail"]').val(), 
            idKomplek: idKomplek, 
            },
          success: function(data){
                    // alert(data);
                    console.log(data);
                   }
         }); 
    });