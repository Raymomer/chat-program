<template>
  <h1>Chat</h1>
</template>

<script>
Pusher.logToConsole = true;

var pusher = new Pusher("ca2f41fe2dcfb6da85ad", {
  cluster: "ap1"
});

var channel = pusher.subscribe("my-channel");
channel.bind("my-event", function(data) {
  console.log("hi");
});

export default {};
</script>

<style>
</style>