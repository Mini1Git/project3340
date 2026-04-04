const input = document.getElementById("profile-address");

document.getElementById("save-address-btn")
.addEventListener("click", async () => {
    const address = input.value;

    try {
        await fetch("../server/update_address.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({address})
        });

        console.log("Address saved!");
    } catch (err) {
        console.error("Save failed:", err);
    }
});