<!--
Function:   index.php file will generet Homepage for Doctor Record website.
Description:This file will Generete a responsive webpape.
            The home page consiste of 3 Me options,
            1)Home:Loads the homepage.
            2)Search Record Hospital Name:This will allows the user to select the Hospital name.
            3)Search Record Location:This will allows the user to select the Location.
            The result of the doctor records based on the user creteria will be displayed on the webpage in table formate
Autor:      Jayashree S Mirji(Email ID:mirjijaya@gmail.com)
Date:       08-July-2017
-->
<html>
<head>
    <!--
    CSS style
    -->
    <style>
        * {
            box-sizing: border-box;
        }
        body{
            background-image: url(back6.jpg);
            background-size: cover;           
        }
        .header, .footer {
            background-color:rgba(106, 189, 245, 0.37);
            color: black;
            padding: 15px;  
        }
        .column {
            float: left;
            padding: 15px;           
        }
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
        .menu {
            width: 25%;
        }
        .content {           
            width: 75%;
        }
        .menu ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        .menu li {
            padding: 8px;
            margin-bottom: 8px;
            background-color: #33b5e5;
            color: #ffffff;
        }
        .menu li:hover {
            background-color: #0099cc;
        }          
        .column
        {
            margin-top:10px;
              
         }  
         td {
            font-family: 'Times New Roman';
            font-size: 20px;
            font-weight: bold;
         }
        #data
        {
            color:black;
        }
        tr:nth-child(even){background-color: #f2f2f2}
        th{
            background-color:black;
            color:white;
        }
        #input_val {
            border: thick;
            border-radius: 100px;
            height: 25px;
        }
        #input_button {
            border: thick;
            border-radius: 100px;
            height: 25px;
            background-color: skyblue;
            width: 100px;
        }
        #text
        {
            background-color: rgba(106, 189, 245, 0.37);
        }
        #quote
        {
            font-weight:bold;
            font-size:20px;
            font-family:'Gabriola';
            color:black;
          background-color: rgba(235, 243, 247, 0.5);
        }
        #test1
        {
            margin:0px;
        }
        #result_tab
        {
            background-color:cadetblue;
            height: 500px;
            overflow-y: scroll;
            display:block;
            color: black;
        }
        #row
        {
            color:black;
        }

    </style>
    <script>
        var hidden_id;
         /*
            Function name:  Display
            Input:          Oncliked Id name
            Output:         Display the hospital or location  list  from database existing entries in the table base on user input      
          */
        function Display(id_name)
        {
            var label;
            if(id_name=="hosp")
            {
                label = "Enter Hospital Name";
            }
            else if (id_name == "loc")
            {
                label = "Enter Location";
            }
            hidden_id=label;
            var ajaxRequest;  // The variable that makes Ajax possible!
	
            try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
            }
	// Create a function that will receive data sent from the server
        
	ajaxRequest.onreadystatechange = function()
        {
		if(ajaxRequest.readyState == 4)
                {
                    var ajaxDisplay = document.getElementById('disp_hosp_list');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
		}
	}
        
        
        var queryString = "?hidden_id=" + hidden_id;
	ajaxRequest.open("GET", "load_hosp_list.php"+queryString, true);
	ajaxRequest.send(null); 
        document.getElementById("test1").innerHTML = "<table><tr>'<td>"+label+"</td><td id='disp_hosp_list'></td><td><input type='button' value='Search' id='input_button' onclick='Load_file()'></td></tr></table>";
       
       }
      
       /*
            Function name:  Load_file
            Input:          xml file
            Output:         Display the doctor record i table format
          */
        function Load_file(xml)
        {
            var id=document.getElementById("hospital_list");
           var hosp_name = id.options[id.selectedIndex].text;
            var ajaxRequest;
            try{
                ajaxRequest = new XMLHttpRequest();
            }
            catch(e){
                try
                {
                    ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                }catch(e)
                {
                    alert("Your browser broke!");
                    return false;
                }
            }
 
            var queryString = "?value=" + hosp_name+"&hidden_id="+hidden_id;
            ajaxRequest.onreadystatechange = function()
            {
                if (ajaxRequest.readyState == 4)
                {
                    var ajaxDisplay = document.getElementById('test1');
                    ajaxDisplay.innerHTML = ajaxRequest.responseText;
                }
            }
            ajaxRequest.open("GET", "search_record.php" + queryString, true);
            ajaxRequest.send();

        }
    </script>
</head>
<body>

    <div class="header">
        <h1>
            Health Care Center
        </h1>
        <h2>
            Doctor Records Monitor
        </h2>
    </div>

    <div class="clearfix">
        <div class="column menu">
            <ul>
                <li class="active" onclick="window.location.reload()">Home</li>
                <li class="active"  id="hosp" onclick="Display(this.id)">Search Record Hospital Name</li>
                <li class="active"  id="loc"  onclick="Display(this.id)">Search Record Location</li>
            </ul>
        </div>

        <div class="column content">
                <div id="test1">
                    <div id="text">
                    <p id="quote">
                    Only a life lived in the service to others is worth living.
                        :-Albert Einstein</p>
                    <p id="quote">
                        One of the first duties of the physician is to educate the masses not to take medicine:-William Osler
                    </p>
                    <p id="quote">

                        The aim of medicine is to prevent disease and prolong life, the ideal of medicine is to eliminate the need of a physician:-William J. Mayo
                    </p>
                    <p id="quote">
                        Much of your pain is the bitter potion by which the physician within you heals your sick self:-Khalil Gibran
                    </p>
                    <p id="quote">
                        I am a scientist and I am a physician. So I write papers:-Siddhartha Mukherjee

                    </p>
                </div>
            </div>
        </div>
        </div>
  
    <div class="footer">
        <p>Location:</p>
        <p>Phone No:1234567890</p>
        <p>Email id:xyz@gmail.com</p>
    </div>

</body>
</html>
