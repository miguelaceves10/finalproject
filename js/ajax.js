$(document).ready(function(){
    $("#avg").on('change', function(){
        if($("#avg").val() == "rm_goals"){
            rm_goals();    
        }
        else if($("#avg").val() == "rm_shots"){
            rm_shots();
        }
        else if($("#avg").val() == "rm_fouls"){
            rm_fouls();
        }
        else if($("#avg").val() == "barca_goals"){
            barca_goals();
        }
        else if($("#avg").val() == "barca_shots"){
            barca_shots();
        }
        else if($("#avg").val() == "barca_fouls"){
            barca_fouls();
        }
    });
    
$("#clear").on('click', function(){
    $("#generate", "#firstTable").html("");
});
    
    //Real Madrid
    function rm_goals(){
        $("#generate").html("");
        $.ajax({
            type : "POST",
            url  : "get_records.php",            
            dataType : "json",
            data : {"sql" : "SELECT * FROM Real_madrid ORDER By total_goals DESC"},            
            success : function(data){
                $("#generate").append("Team: Real Madrid<br>");
                 $("#generate").append("<tr>" + 
                    "<td style='width:10%'><strong>Position</strong></td>" + 
                    "<td style='width:10%'><strong>First Name</strong></td>" +
                    "<td style='width:10%'><strong>Last Name</strong></td>" +
                    "<td style='width:10%'><strong>Kit Number</strong></td>" +
                    "<td style='width:10%'><strong>Age</strong></td>" +
                    "<td style='width:10%'><strong>Total Goals</strong></td>" + 
                    "<td style='width:10%'><strong>Total Shots</strong></td>" +
                    "<td style='width:10%'><strong>Yellow Cards</strong></td>" +
                    "<td style='width:10%'><strong>Red Cards</strong></td>" +
                    "<td style='width:10%'><strong>Fouls Committed</strong></td>" +
                    "</tr>");
                    
                    for(var i = 0; i < data.length; i++){
                        $("#generate").append("<tr>" +
                    "<td>" + data[i]['position'] + "</td> " + 
                    "<td>" + data[i]['player_first_name'] + "</td> " +
                    "<td>" + data[i]['player_last_name'] + "</td> " +
                    "<td>" + data[i]['kit_number'] + "</td> " +
                    "<td>" + data[i]['age'] + "</td> " +
                    "<td>" + data[i]['total_goals'] + "</td> " +
                    "<td>" + data[i]['total_shots'] + "</td> " +
                    "<td>" + data[i]['yellow_cards'] + "</td> " +
                    "<td>" + data[i]['red_cards'] + "</td> " +
                    "<td>" + data[i]['fouls_committed'] + "</td>" +
                    "</tr>");
                    }
            },
            complete: function(data,status) { //optional, used for debugging purposes
                //alert(status);
            }

        });//AJAX
    }
    
    function rm_shots(){
        $("#generate").html("");
        $.ajax({
            type : "POST",
            url  : "get_records.php",            
            dataType : "json",
            data : {"sql" : "SELECT AVG(total_shots) FROM Real_madrid"},            
            success : function(data){
                 $("#generate").append("<tr>" + 
                     "<td><strong>Team</strong></td>" + 
                     "<td><strong>Average Shots</strong></td>" +
                     "</tr>");
                $("#generate").append("<tr>" +
                    "<td>" + "Real Madrid" + "</td> " + 
                    "<td>" + data[0]['AVG(total_shots)'] + "</td> " +
                    "</tr>");
            },
            complete: function(data,status) { //optional, used for debugging purposes
                //alert(status);
            }

        });//AJAX
    }
    
    function rm_fouls(){
        $("#generate").html("");
        $.ajax({
            type : "POST",
            url  : "get_records.php",            
            dataType : "json",
            data : {"sql" : "SELECT SUM(fouls_committed) FROM Real_madrid"},            
            success : function(data){
                 $("#generate").append("<tr>" + 
                     "<td><strong>Team</strong></td>" + 
                     "<td><strong>Total Fouls</strong></td>" +
                     "</tr>");
                $("#generate").append("<tr>" +
                    "<td>" + "Real Madrid" + "</td> " + 
                    "<td>" + data[0]['SUM(fouls_committed)'] + "</td> " +
                    "</tr>");
            },
            complete: function(data,status) { //optional, used for debugging purposes
                //alert(status);
            }

        });//AJAX
    }
    
    //Barca
    function barca_goals(){
        $("#generate").html("");
        $.ajax({
            type : "POST",
            url  : "get_records.php",            
            dataType : "json",
            data : {"sql" : "SELECT * FROM Barcelona ORDER By total_goals DESC"},            
            success : function(data){
                 $("#generate").append("Team: Barcelona<br>");
                 $("#generate").append("<tr>" + 
                    "<td style='width:10%'><strong>Position</strong></td>" + 
                    "<td style='width:10%'><strong>First Name</strong></td>" +
                    "<td style='width:10%'><strong>Last Name</strong></td>" +
                    "<td style='width:10%'><strong>Kit Number</strong></td>" +
                    "<td style='width:10%'><strong>Age</strong></td>" +
                    "<td style='width:10%'><strong>Total Goals</strong></td>" + 
                    "<td style='width:10%'><strong>Total Shots</strong></td>" +
                    "<td style='width:10%'><strong>Yellow Cards</strong></td>" +
                    "<td style='width:10%'><strong>Red Cards</strong></td>" +
                    "<td style='width:10%'><strong>Fouls Committed</strong></td>" +
                    "</tr>");
                    
                    for(var i = 0; i < data.length; i++){
                        $("#generate").append("<tr>" +
                    "<td>" + data[i]['position'] + "</td> " + 
                    "<td>" + data[i]['player_first_name'] + "</td> " +
                    "<td>" + data[i]['player_last_name'] + "</td> " +
                    "<td>" + data[i]['kit_number'] + "</td> " +
                    "<td>" + data[i]['age'] + "</td> " +
                    "<td>" + data[i]['total_goals'] + "</td> " +
                    "<td>" + data[i]['total_shots'] + "</td> " +
                    "<td>" + data[i]['yellow_cards'] + "</td> " +
                    "<td>" + data[i]['red_cards'] + "</td> " +
                    "<td>" + data[i]['fouls_committed'] + "</td>" +
                    "</tr>");
                    }
            },
            complete: function(data,status) { 
                
            }

        });//AJAX
    }
    
    function barca_shots(){
        $("#generate").html("");
        $.ajax({
            type : "POST",
            url  : "get_records.php",            
            dataType : "json",
            data : {"sql" : "SELECT AVG(total_shots) FROM Barcelona"},            
            success : function(data){
                 $("#generate").append("<tr>" + 
                     "<td><strong>Team</strong></td>" + 
                     "<td><strong>Average Shots</strong></td>" +
                     "</tr>");
                $("#generate").append("<tr>" +
                    "<td>" + "Barcelona" + "</td> " + 
                    "<td>" + data[0]['AVG(total_shots)'] + "</td> " +
                    "</tr>");
            },
            complete: function(data,status) {
               
            }

        });//AJAX
    }
    
    function barca_fouls(){
        $("#generate").html("");
        $.ajax({
            type : "POST",
            url  : "get_records.php",            
            dataType : "json",
            data : {"sql" : "SELECT SUM(fouls_committed) FROM Barcelona"},            
            success : function(data){
                 $("#generate").append("<tr>" + 
                     "<td><strong>Team</strong></td>" + 
                     "<td><strong>Total Fouls</strong></td>" +
                     "</tr>");
                $("#generate").append("<tr>" +
                    "<td>" + "Barcelona" + "</td> " + 
                    "<td>" + data[0]['SUM(fouls_committed)'] + "</td> " +
                    "</tr>");
            },
            complete: function(data,status) { //optional, used for debugging purposes
                //alert(status);
            }

        });//AJAX
    }
});