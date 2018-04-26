/*
Template Name: Monster Admin
Author: Themedesigner
Email: niravjoshi87@gmail.com
File: js
*/
$(function() {
    "use strict";
    $(function() {
        $(".preloader").fadeOut();
    });
    jQuery(document).on('click', '.mega-dropdown', function(e) {
        e.stopPropagation()
    });
    // ============================================================== 
    // This is for the top header part and sidebar part
    // ==============================================================  
    var set = function() {
        var width = (window.innerWidth > 0) ? window.innerWidth : this.screen.width;
        var topOffset = 70;
        if (width < 500) {
            $("body").addClass("mini-sidebar");
            $('.navbar-brand span').hide();
            $(".scroll-sidebar, .slimScrollDiv").css("overflow-x", "visible").parent().css("overflow", "visible");
            $(".sidebartoggler i").addClass("ti-menu");
        } else {
            $("body").removeClass("mini-sidebar");
            $('.navbar-brand span').show();
            $(".sidebartoggler i").removeClass("ti-menu");
        }

        var height = ((window.innerHeight > 0) ? window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $(".page-wrapper").css("min-height", (height) + "px");
        }

    };
    $(window).ready(set);
    $(window).on("resize", set);

    // topbar stickey on scroll

    $(".fix-header .topbar").stick_in_parent({

    });

    // this is for close icon when navigation open in mobile view
    $(".nav-toggler").click(function() {
        $("body").toggleClass("show-sidebar");
        $(".nav-toggler i").toggleClass("ti-menu");
        $(".nav-toggler i").addClass("ti-close");
    });
    $(".sidebartoggler").on('click', function() {
        $(".sidebartoggler i").toggleClass("ti-menu");
    });

    // ============================================================== 
    // Auto select left navbar
    // ============================================================== 
    $(function() {
        var url = window.location;
        var element = $('ul#sidebarnav a').filter(function() {
            return this.href == url;
        }).addClass('active').parent().addClass('active');
        while (true) {
            if (element.is('li')) {
                element = element.parent().addClass('in').parent().addClass('active');
            } else {
                break;
            }
        }
    });

    // ============================================================== 
    // Sidebarmenu
    // ============================================================== 
    $(function() {
        $('#sidebarnav').metisMenu();
    });
    // ============================================================== 
    // Slimscrollbars
    // ============================================================== 
    $('.scroll-sidebar').slimScroll({
        position: 'left',
        size: "5px",
        height: '100%',
        color: '#dcdcdc'
    });

    // ============================================================== 
    // Resize all elements
    // ============================================================== 
    $("body").trigger("resize");
});

function showMitra (box,box2,box3,box4,box5) {

    var chboxs = document.getElementsByName("mitraToggle");
    var vis = "none";
    for(var i=0;i<chboxs.length;i++) {
        if(chboxs[i].checked){
            vis = "";
            break;
        }
    }
    document.getElementById(box).style.display = vis;
    document.getElementById(box2).style.display = vis;
    document.getElementById(box3).style.display = vis;
    document.getElementById(box4).style.display = vis;
    document.getElementById(box5).style.display = vis;


}

$(document).ready(function() {
    $(".select2").select2();
});

$(document).ready(function() {
    // var profilId = $( "input[type=hidden][name=idProfil]" ).val();
    $('select[name="jurusan"]').on('change', function(){
        var jurusanId = $(this).val();
        if(jurusanId) {
            $.ajax({
                url: '/users/profil/getProdi/'+jurusanId,
                // url: '/profil/'+profilId+'/edit/getProdi/'+jurusanId,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="prodi"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="prodi"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
                error: function(xhr, status, error) {
                    // check status && error
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="prodi"]').empty();
        }

    });

});

$(function() {
    $( "#datepicker" ).datepicker();
});

$(function() {
    $("#clockpicker").clockpicker();
});

$("#read").click(function() {

    if($("#read").val()==0)
    {
        $("#read").val(1);
    }
    else
    {
        $("#read").val(0);
    }

});
$("#read1").click(function() {

    if($("#read1").val()==0)
    {
        $("#read1").val(1);
    }
    else
    {
        $("#read1").val(0);
    }

});

