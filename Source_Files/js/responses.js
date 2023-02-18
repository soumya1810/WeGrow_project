function getBotResponse(input) {
    //rock paper scissors
    if (input == "Hey" ||input=="hey" || input=="Hello"|| input=="hello") {
        return "Hello, how can we help you today?";
    } 
    else if (input == "cost"||input=="price"||input=="product") {
        return "View our price list to explore our products and their prices.";
    } 
    else if (input == "when does the shop open and closes?"||input=="What are the shop timings?") {
        return "10am to 10pm";
    }

    // Simple responses
    if (input == "hello") {
        return "Hello there!";
    } else if (input == "goodbye") {
        return "Talk to you later!";
    } else {
        return "You can contact us on +91 9345432120 for more information.";
    }
}