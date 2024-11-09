document.addEventListener("DOMContentLoaded", () => {
    const startButton = document.getElementById("startButton");
    setTimeout(() => {
        startButton.classList.add("show");
    }, 1000);
    startButton.addEventListener("click", () => {
        window.location.href = "bet.html";
    });
});

document.addEventListener('DOMContentLoaded', () => { 
    let money = parseInt(localStorage.getItem('money')) || 5000; 
    let currentBet = 0;

    const availableMoneyDisplay = document.getElementById('available-money');
    const betAmountDisplay = document.getElementById('bet-amount'); 
    const playButton = document.getElementById('playButton');

    availableMoneyDisplay.innerText = `$${money}`;
    playButton.style.opacity = '0.5'; 
    playButton.style.pointerEvents = 'none'; 

    document.querySelectorAll('.chip-button').forEach(button => {
        button.addEventListener('click', () => {
            const betAmount = parseInt(button.getAttribute('data-bet'));

            if (money >= betAmount) {
                currentBet = betAmount;
                money -= betAmount; 

                console.log(`Taruhan: $${betAmount}, Sisa uang: $${money}`);
            
                availableMoneyDisplay.innerText = `$${money}`;
                betAmountDisplay.innerText = `$${currentBet}`;
            
                if (currentBet > 0) {  
                    playButton.style.opacity = '1';
                    playButton.style.pointerEvents = 'auto';
                }
            } else {
                alert('Saldo tidak mencukupi untuk taruhan ini!');
            }
        });
    });

    playButton.addEventListener('click', () => {
        if (currentBet > 0) {
            localStorage.setItem('money', money);  
            localStorage.setItem('currentBet', currentBet);
        if (money >= 0) {
            console.log(`Memulai permainan dengan sisa uang: $${money}`);
            window.location.href = 'Game.html'; 
        } else {
            alert('Saldo tidak boleh negatif. Periksa kembali taruhan.');
        }
    }
    });
});

document.addEventListener("DOMContentLoaded", () => {
    let money = parseInt(localStorage.getItem('money')) || 5000;
    let currentBet = parseInt(localStorage.getItem('currentBet')) || 0;

    const availableMoneyDisplay = document.getElementById('available-money');
    const betAmountDisplay = document.getElementById('bet-amount');

    availableMoneyDisplay.innerText = `$${money}`;
    betAmountDisplay.innerText = currentBet > 0 ? `$${currentBet}` : 'Belum ada taruhan';

    const result = localStorage.getItem('lastResult');
    if (result) {
        updateMoney(result);
        localStorage.removeItem('lastResult'); 
    }
});


let bandarSum = 0;
let yourSum = 0;
let bandarAceCount = 0;
let yourAceCount = 0;
let hidden;
let deck;
let canHit = true; 

window.onload = function () {
    buildDeck();
    shuffleDeck();
    startGame();
};

function buildDeck() {
    let values = ["A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K"];
    let types = ["C", "D", "H", "S"];
    deck = [];

    for (let i = 0; i < types.length; i++) {
        for (let j = 0; j < values.length; j++) {
            deck.push(values[j] + "-" + types[i]);
        }
    }
}

function shuffleDeck() {
    for (let i = 0; i < deck.length; i++) {
        let j = Math.floor(Math.random() * deck.length); 
        let temp = deck[i];
        deck[i] = deck[j];
        deck[j] = temp;
    }
}

function startGame() {
    hidden = deck.pop();
    bandarSum += getValue(hidden);
    bandarAceCount += checkAce(hidden);

    let bandarVisibleCard = deck.pop();
    bandarSum += getValue(bandarVisibleCard);
    bandarAceCount += checkAce(bandarVisibleCard);

    let cardImg = document.createElement("img");
    cardImg.src = "./cards/" + bandarVisibleCard + ".png";
    document.getElementById("dealer-cards").append(cardImg);
    document.getElementById("dealer-sum").innerText = bandarSum;

    for (let i = 0; i < 2; i++) {
        let cardImg = document.createElement("img");
        let card = deck.pop();
        cardImg.src = "./cards/" + card + ".png";
        yourSum += getValue(card);
        yourAceCount += checkAce(card);
        document.getElementById("your-cards").append(cardImg);
    }
    document.getElementById("your-sum").innerText = yourSum;

    document.getElementById("hit").addEventListener("click", hit);
    document.getElementById("stay").addEventListener("click", stay);
}

function hit() {
    if (!canHit) return;

    let cardImg = document.createElement("img");
    let card = deck.pop();
    cardImg.src = "./cards/" + card + ".png";
    yourSum += getValue(card);
    yourAceCount += checkAce(card);
    document.getElementById("your-cards").append(cardImg);
    document.getElementById("your-sum").innerText = reduceAce(yourSum, yourAceCount);

    if (reduceAce(yourSum, yourAceCount) > 21) {
        canHit = false;
        showPopup("lose");
    }
}

function stay() {
    bandarSum = reduceAce(bandarSum, bandarAceCount);
    yourSum = reduceAce(yourSum, yourAceCount);

    canHit = false;
    document.getElementById("hidden").src = "./cards/" + hidden + ".png"; 
    while (bandarSum < 17) {
        let card = deck.pop();
        bandarSum += getValue(card);
        bandarAceCount += checkAce(card);
        let cardImg = document.createElement("img");
        cardImg.src = "./cards/" + card + ".png";
        document.getElementById("dealer-cards").append(cardImg);
        bandarSum = reduceAce(bandarSum, bandarAceCount);
    }

    document.getElementById("dealer-sum").innerText = bandarSum;

    let result = checkResult();
    showPopup(result);
}

function getValue(card) {
    let data = card.split("-"); 
    let value = data[0];

    if (isNaN(value)) { 
        if (value == "A") return 11;
        return 10;
    }
    return parseInt(value);
}

function checkAce(card) {
    if (card[0] == "A") {
        return 1;
    }
    return 0;
}

function reduceAce(playerSum, aceCount) {
    while (playerSum > 21 && aceCount > 0) {
        playerSum -= 10;
        aceCount -= 1;
    }
    return playerSum;
}

function checkResult() {
    if (yourSum > 21) {
        return "lose";
    } else if (bandarSum > 21) {
        return "win";
    } else if (yourSum > bandarSum) {
        return "win";
    } else if (bandarSum > yourSum) {
        return "lose";
    } else {
        return "tie";
    }
}

function showPopup(result) {
    const popupContainer = document.getElementById("popup-container");
    const popupText = document.querySelector(".popup-text");
    const popupImage = document.querySelector(".popup-image");

    if (result === "win") {
        popupText.innerText = "Kamu Menang!";
        popupImage.src = "./imgs/Gacor.webp";
    } else if (result === "lose") {
        popupText.innerText = "Kamu Kalah!";
        popupImage.src = "./imgs/Rugi dong.webp";
    } else {
        popupText.innerText = "Hasil Seri!";
        popupImage.src = "./imgs/TidakMenarik.jpg";
    }

    popupContainer.style.display = "block";
    localStorage.setItem('lastResult', result); 
}


function updateMoney(result) {
    let money = parseInt(localStorage.getItem('money')) || 5000;
    const betAmount = parseInt(localStorage.getItem('currentBet')) || 0;

    if (result === "win") {
        money += betAmount * 2;
        console.log(`Menang! Uang bertambah: $${betAmount * 2}, Total uang: $${money}`);
    } else if (result === "tie") {
        money += betAmount;
        console.log(`Seri! Taruhan dikembalikan: $${betAmount}, Total uang: $${money}`);
    } else if (result === "lose") {
        money -= betAmount;
        console.log(`Kalah! Uang berkurang: $${betAmount}, Total uang: $${money}`);
    }

    document.getElementById('available-money').innerText = `$${money}`;
    localStorage.setItem('money', money);
    if (money <= 0) {
        showGameOver();
    }
}
function showGameOver() {
    const gameOverContainer = document.getElementById("gameover-container");
    const gameOverText = document.querySelector(".gameover-text");
    const gameOverImage = document.querySelector(".gameover-image");

    gameOverText.innerText = "Game Over! Uangmu habis.";
    gameOverImage.src = "./imgs/HabisDuit.jpg";
    gameOverContainer.style.display = "block";

    console.log("Game Over! Uang habis.");

    document.getElementById("restart-button").addEventListener("click", () => {
        const initialMoney = 5000;
        localStorage.setItem('money', initialMoney);
        console.log(`Game di-reset. Uang awal: $${initialMoney}`);
        window.location.href = "bet.html";
    });
}

document.getElementById("reset-button").addEventListener("click", () => {
    window.location.href = "bet.html"; 
});

document.getElementById("close-button").addEventListener("click", () => {
    const popupContainer = document.getElementById("popup-container");
    popupContainer.style.display = "none";
});