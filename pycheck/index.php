<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style>

.container {
}

div.scrollmenu {
  background-color: #333;
  overflow: auto;
  white-space: nowrap;
}

div.scrollmenu a {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px;
  text-decoration: none;
}

div.scrollmenu a:hover {
  background-color: #777;
}

.open-nav {
  cursor: pointer;
}

.navbar-bottom {
  height: 180px;
  background-color: transparent;
  width: 100%;
  display: flex;
  flex-direction: column;
  position: fixed;
  bottom: -132px;
  width: 100%;
  transition: all .5s;
}

.opened {
  bottom: 0;
}
</style>
    <link rel="stylesheet" href="../CSS/home-style.css">
    <link rel="stylesheet" type="text/css" href="symptom_selector/selector.css?v=1">
    <link rel="stylesheet" type="text/css" href="symptom_selector/fontawesome/assets/css/font-awesome.min.css" />
    <script src="libs/jquery-1.12.2.min.js"></script>
    <script src="libs/json2.js"></script><!-- json for ie7 -->
    <script src="libs/jquery.imagemapster.min.js?v=1.1"></script>
    <script src="libs/typeahead.bundle.js"></script>

    <script src="symptom_selector/selector.js?v=3.3"></script>

    <?php

    // session_start(); // this causes some issues with certain servers, try this if it's working with this line or not.

    if (!isset($_SESSION['userToken']) || !isset($_SESSION['tokenExpireTime']) || time() >= $_SESSION['tokenExpireTime']) {
        require 'token_generator.php';
        $tokenGenerator = new TokenGenerator("a6NXo_GMAIL_COM_AUT", "o2KEb94YiWw83Dyq5", "https://authservice.priaid.ch/login");
        $token = $tokenGenerator->loadToken();
        $_SESSION['userToken'] = $token->{'Token'};
        $_SESSION['tokenExpireTime'] = time() + $token->{'ValidThrough'};
    }

    $token = $_SESSION['userToken'];
    ?>

    <script type="text/javascript">
        var userToken = <?php echo "'" . $token . "'" ?>;

        $(document).ready(function() {
            $("#symptomSelector").symptomSelector({
                mode: "diagnosis",
                webservice: "https://healthservice.priaid.ch",
                language: "en-gb",
                specUrl: "sample_specialisation_page",
                accessToken: userToken
            });
        });
    </script>


</head>

<body ><center>
    <h1 style="color: #336699"><b>Physical Health Checker</b></h1></center><br>
    <table class="container-table">
        <tr>
            <td valign="middle" colspan="2" class="td-header box-white bordered-box width50">
                <h4 class="header" id="selectSymptomsTitle"><span class="badge pull-left badge-primary visible-lg margin5R">1</span></h4>
            </td>
            <td valign="middle" class="td-header bordered-box box-white width25">
                <h4 class="header" id="selectedSymptomsTitle"><span class="badge pull-left badge-primary visible-lg margin5R">2</span></h4>
            </td>
            <td valign="middle" class="td-header bordered-box box-white width25">
                <h4 class="header" id="possibleDiseasesTitle"><span class="badge pull-left badge-primary visible-lg margin5R">3</span></h4>
            </td>
        </tr>
        <tr>
            <td valign="top" class="selector_container bordered-box box-white width25">
                <div id="symptomSelector"></div>
            </td>
            <td valign="top" class="selector_container bordered-box box-white width25">
                <div id="symptomList"></div>
            </td>
            <td valign="top" class="selector_container bordered-box box-white width25">
                <div id="selectedSymptomList"></div>
            </td>
            <td valign="top" class="selector_container bordered-box box-white width25">
                <div id="diagnosisList"></div>
            </td>
        </tr>
    </table>
    <br/>
    
  
<script>
$('.open-nav').click(function() {
  $('.navbar-bottom').toggleClass("opened");
});
</script>

</html>