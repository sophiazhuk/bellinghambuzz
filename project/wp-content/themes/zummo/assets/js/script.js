document.addEventListener("DOMContentLoaded", () => {
  const fixedMessage = document.createElement("a");
  fixedMessage.id = "zummo-fixed-message";
  fixedMessage.href = "https://effethemes.com/themes/zummo-wordpress-theme/";
  fixedMessage.target = "_blank";
  fixedMessage.innerText = "Unlock the full potential of the Zummo Theme by upgrading to the premium version today!";

  Object.assign(fixedMessage.style, {
      position: "fixed",
      top: "50%",
      right: "0",
      transform: "translateY(-50%)",
      backgroundColor: "#0758b3",
      color: "#fff",
      padding: "10px 20px",
      writingMode: "vertical-rl",
      textAlign: "center",
      fontSize: "14px",
      zIndex: "1000",
      cursor: "pointer",
      textDecoration: "none",
  });

  document.body.appendChild(fixedMessage);
});
