<script>
window.onload=function getLocation() {
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (p) {
        alert(p.coords.latitude+'--'+p.coords.longitude);
	}
}
}
</script>