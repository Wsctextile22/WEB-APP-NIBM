<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<meta charset="utf-8">
<title>Display Webcam Stream</title>
 
<style>


#container {
	margin: 0px auto;
	width: 500px;
	height: 375px;
border: 10px #333 solid;

}
#videoElement {
	width: 500px;
	height: 375px;
	background-color: #666;
}
</style>
</head>
 
<body>
  <h1>Display WebCam Streem</h1>
<div id="container">
	<video autoplay="true" id="videoElement">
	<script>

  var video = document.querySelector("#videoElement");

if (navigator.mediaDevices.getUserMedia) {
  navigator.mediaDevices.getUserMedia({ video: true })
    .then(function (stream) {
      video.srcObject = stream;
    })
    .catch(function (err0r) {
      console.log("Something went wrong!");
    });
}
else
{
  console.log("getUserMedia not supported");
}
</script>
	</video>
</div>
<script>

</script>
<br>
<div class="d-flex justify-content-center">
    <a href="qualityCheckerDashboard.php" class="btn btn-info"> Go Back</a>
    </div>
</body>
</html>