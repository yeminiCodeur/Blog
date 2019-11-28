$(document).ready(function()
{
    $('#modal1').modal('open');
    $(document).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal').modal();
   });

    $(".see_comment").click(function()
    {
        var  id = $(this).attr("id");
        $.post('ajax/see_comment.php',{id:id}, function(){
           $("#commentaire_" + id).hide();
        });
    });

    $(".delete_comment").click(function(){
        var  id = $(this).attr("id");
        $.post('root/ajax/delete_comment.php',{id:id}, function(){
            $("#commentaire_" + id).hide();
        });
    });

    $('select').material_select();


    $('.reply').click(function(e){
        e.preventDefault();
        var  $this=$(this);
        var $comment=$(this).parents('.comment');
        var $form=$('#comment');
        var  id=$(this).data('id');
        $form.hide();
         $comment.after($form);
        $form.slideDown();
        $('#parent_id').val(id);
    });


    $(".post_comment").click(function(){
        var  id = $(this).attr("id");
        $.post('root/ajax/delete_comment.php',{id:id}, function(){
            $("#commentaire_" + id).hide();
        });
    });



});

/*$(document).ready(function(){
    /*
    getDonnees();
    $('.formsolution').submit(function(){

        var  classe=$('.classe').val();
        var content = $('.content').val();

        $.post('solutionProposee',{
            classe:classe,
            content:content
        },function(donnees){
            $('#solution').html(donnees);
            $('.classe').val('');
            $('.solution').val('');
            getDonnees();
        });

        return false;
    });
    function getDonnees(){
        $.post('solutionProposee', function(data){
            $('#afficherSolution').html(data);
        });
    }

    setInterval(getDonnees,1000);

});*/
