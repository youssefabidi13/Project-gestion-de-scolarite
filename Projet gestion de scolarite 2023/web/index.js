function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }
function submitConv() { 
    $.ajax({
        type: "POST",
        url: '/convention.php',
        data: {
            'entreprise': $("#entreprise").val(), 
            'debut': $("#debut").val(), 
            'fin': $("#fin").val(), 
            'type': $("#type").val(), 
            'filiere': $("#filiere").val(), 
        },
        success: function(data)
        {
            if(data == "success") {
                $("#success").show();
                $("#error").hide();
                return;
            }
            $("#error").text(data);
            $("#error").show();
            $("#success").hide();
        }, error: function (error) {
            $("#error").text(JSON.stringify(error));
            $("#error").show();
            $("#success").hide();
        }
    });
}

function submitAutre(type) {
    $.ajax({
        type: "POST",
        url: '/autre.php',
        data: {
            'type': type 
        },
        success: function(data)
        {
            if(data == "success") {
                $("#success").show();
                $("#error").hide();
                return;
            }
            $("#error").text(data);
            $("#error").show();
            $("#success").hide();
        }, error: function (error) {
            $("#error").text(JSON.stringify(error));
            $("#error").show();
            $("#success").hide();
        }
    });
}
function submitNot() { 
    $.ajax({
        type: "POST",
        url: '/notes.php',
        data: {
            'notes': $("#notes").val(), 
        },
        success: function(data)
        {
            if(data == "success") {
                $("#success").show();
                $("#error").hide();
                return;
            }
            $("#error").text(data);
            $("#error").show();
            $("#success").hide();
        }, error: function (error) {
            $("#error").text(JSON.stringify(error));
            $("#error").show();
            $("#success").hide();
        }
    });
}
(function($) {
    let active = "";
    $("#login-submit").show();
    $("#error").hide();
    $("#success").hide();
    $("#convention_form").hide();
    $("#selection").hide();
    $("#envoyer").hide();
    $("#releve_form").hide();

    const regex = new RegExp(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/);
    const cookie_email = getCookie("email");
    const cookie_cin = getCookie("cin");
    const cookie_apoge = getCookie("apoge");
    const cookie_filiere = getCookie("filiere");
    const cookie_notes = getCookie("notes");
    if(regex.test(cookie_email) && cookie_filiere != null && cookie_cin != null && cookie_apoge != null && cookie_notes != null){
        $("#emailAddress").val(cookie_email);
        $("#cinNumber").val(cookie_cin);
        $("#apoge").val(cookie_apoge);
        $("#error").hide();
        $("#error").hide();
        $("#selection").show();
        $("#envoyer").show();
        $("#login-submit").hide();
        $("#convention_form").show();
        $("#convention").removeClass("btn-light").addClass("btn-primary");
        active = "convention";
        const options = JSON.parse(cookie_notes);
        console.log(JSON.parse(cookie_notes));
        var $el = $("#notes");
        $el.empty();
        $.each(options, function(key,value) {
        $el.append($("<option></option>")
            .attr("value", value).text(value));
        });
}
    
    $('#loginform').submit(function(e) {
        e.preventDefault();
        if(regex.test($("#emailAddress").val())) {
            $.ajax({
                type: "POST",
                url: '/login.php',
                data: {
                    'email': $('#emailAddress').val(),
                    'apoge': $('#apoge').val(),
                    'cin': $("#cinNumber").val()
                },
                success: function(data)
                {
                    if(data == "success") {
                    const new_cookie_email = getCookie("email");
                   if(regex.test(new_cookie_email)){
                        $("#error").hide();
                        $("#error").hide();
                        $("#selection").show();
                        $("#envoyer").show();
                        $("#login-submit").hide();
                        $("#convention_form").show();
                        $("#convention").removeClass("btn-light").addClass("btn-primary");
                        active = "convention";
                        const cookie_etudiant = getCookie("etudiant");
                        $.ajax({
                            type: "POST",
                            url: '/filiere.php',
                            data: {
                                'id': cookie_etudiant
                            },
                            success: function(data)
                            {

                                if(data == "success") {
                                    const options = JSON.parse(getCookie("notes"));
                                    console.log(JSON.parse(getCookie("notes")));
                                    var $el = $("#notes");
                                    $el.empty();
                                    $.each(options, function(key,value) {
                                    $el.append($("<option></option>")
                                        .attr("value", value).text(value));
                                    });
                                    return;
                                    }
                                    $("#error").text(JSON.stringify(data));
                                    $("#error").show();
                                    console.error(error);
                                }, error: function (error) {
                                    $("#error").text(JSON.stringify(error));
                                    $("#error").show();
                                }});
                                return;
                    }
            return;
        }
        $("#error").text(JSON.stringify(error));
        $("#error").show();
        console.error(error);
    },
                error: function (error) {
                    $("#error").text(JSON.stringify(error));
                    $("#error").show();
                    console.error(error);
                }
            });
        } else {
            alert('please enter a valid email!' + $("#emailAddress").val());
        }
     });

    $("#convention").click(function(e){
        e.preventDefault();
        active = "convention";
        $(".selectable").removeClass("btn-primary").addClass("btn-light");
        $("#convention").removeClass("btn-light").addClass("btn-primary");
        $("#releve_form").hide();
        $("#convention_form").show();
    });
    $("#scolarite").click(function(e){
        e.preventDefault();
        active = "scolarite";
        $(".selectable").removeClass("btn-primary").addClass("btn-light");
        $("#scolarite").removeClass("btn-light").addClass("btn-primary");
        $("#releve_form").hide();
        $("#convention_form").hide();
    });
    $("#demande").click(function(e){
        e.preventDefault();
        active = "demande";
        $(".selectable").removeClass("btn-primary").addClass("btn-light");
        $("#demande").removeClass("btn-light").addClass("btn-primary");
        $("#releve_form").hide();
        $("#convention_form").hide();
    });
    $("#reussite").click(function(e){
        e.preventDefault();
        active = "reussite";
        $(".selectable").removeClass("btn-primary").addClass("btn-light");
        $("#reussite").removeClass("btn-light").addClass("btn-primary");
        $("#convention_form").hide();
        $("#releve_form").hide();
    });
    $("#releve").click(function(e){
        e.preventDefault();
        active = "releve";
        $(".selectable").removeClass("btn-primary").addClass("btn-light");
        $("#releve").removeClass("btn-light").addClass("btn-primary");
        $("#convention_form").hide();
        $("#releve_form").show();
    });

    
    $("#envoyer").click(function (e) {
       e.preventDefault();
       active == "convention" ? submitConv() :  active == "scolarite" ? submitAutre("Attestation de scolarite") : active == "demande" ? submitAutre("Demande de stage") :  active == "reussite" ? submitAutre("Attesstation de reussite") : active == "releve" ? submitNot() : null;
    });

})(jQuery);