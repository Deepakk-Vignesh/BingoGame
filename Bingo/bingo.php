<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style type="text/css">
			.bigbox{
				height:450px;
				width:450px;
				border: 4px solid black;
			}
			td{
				border: 1px solid grey;
				width:60px;
                height:60px;
                align-content: center;
				font-size: 45px;
				text-align:center;
                cursor: pointer;
			}
			input{
				border: 0;
				width:45px;
				height:44px;	
				align-content: center;
				font-size: 45px;
				text-align:center;
			}
			input:focus{
				outline:0;
			}
			input[type="number"]::-webkit-outer-spin-button, input[type="number"]::-webkit-inner-spin-button {
			-webkit-appearance: none;
			margin: 0;
			}
			input[type="number"] {
			-moz-appearance: textfield;
			}
			input[type="submit"]{
				width: 100px;
				height: 50px;
				font-size: 25px;
				cursor: pointer; 
            }
            .cross{
                float:left;
                z-index: 1;
                display: inline-block;
                height:50px;
                transform: translate(30px,0) rotate(45deg);
                -webkit-transform:  translate(30px,0) rotate(45deg);
                -moz-transform: translate(30px,0) rotate(45deg);
                border:1px solid black;
            }

		</style>
	</head>

    <body>
        <table cellspacing="0">
            <tr>
                <td id="11" onclick="clicked(this);"></td>
                <td id="12" onclick="clicked(this);"></td>
                <td id="13" onclick="clicked(this);"></td>
                <td id="14" onclick="clicked(this);"></td>
                <td id="15" onclick="clicked(this);"></td>
            </tr>
            <tr>
                <td id="21"onclick="clicked(this);"></td>
                <td id="22" onclick="clicked(this);"></td>
                <td id="23" onclick="clicked(this);"></td>
                <td id="24" onclick="clicked(this);"></td>
                <td id="25" onclick="clicked(this);"></td>
            </tr>
            <tr>
                <td id="31" onclick="clicked(this);"></td>
                <td id="32" onclick="clicked(this);"></td>
                <td id="33" onclick="clicked(this);"></td>
                <td id="34" onclick="clicked(this);"></td>
                <td id="35" onclick="clicked(this);"></td>
            </tr>
            <tr>
                <td id="41" onclick="clicked(this);"></td>
                <td id="42" onclick="clicked(this);"></td>
                <td id="43" onclick="clicked(this);"></td>
                <td id="44" onclick="clicked(this);"></td>
                <td id="45" onclick="clicked(this);"></td>
            </tr>
            <tr>
                <td id="51" onclick="clicked(this);"></td>
                <td id="52" onclick="clicked(this);"></td>
                <td id="53" onclick="clicked(this);"></td>
                <td id="54" onclick="clicked(this);"></td>
                <td id="55" onclick="clicked(this);"></td>
            </tr>
        </table>
        <div id="undo"></div>
        <script src="bingo.js"></script>
    </body>
</html>