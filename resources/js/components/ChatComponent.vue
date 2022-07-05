<template>
  <h1>Chat</h1>
</template>

<script>
Pusher.logToConsole = true;

var pusher = new Pusher("ca2f41fe2dcfb6da85ad", {
  cluster: "ap1"
});

var channel = pusher.subscribe("private-my-channel");
channel.bind("my-event", function(data) {
  console.log("hi");
});

channel.bind("pusher:subscription_succeeded", () => {
  console.log("Success");
});

export default {
  created() {
    let register = new Promise((resolve, rej) => {
      axios.get("api/register?account=hhh&password=hhh&name=Hhh").then(res => {
        resolve(res);
      });
    });

    let login = new Promise((resolve, rej) => {
      axios.get("api/login?account=aaa&password=aaa").then(res => {
        resolve(res);
      });
    });

    let auth = new Promise((resolve, rej) => {
      axios.get("api/auth?userId=4").then(res => {
        resolve(res);
      });
    });

    Promise.all([login]).then(res => {
      console.log(res);
      auth.then(res => {
        console.log(res);
      });
    });
  }
};
</script>

<style>
</style>