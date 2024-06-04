function generateID() {
    const today = new Date();
    const year = today.getFullYear();
    const month = ('0' + (today.getMonth() + 1)).slice(-2);
    const day = ('0' + today.getDate()).slice(-2);

    const randomPart = Math.floor(1000 + Math.random() * 9000); // Random 4-digit number

    return `BK-${year}${month}${day}${randomPart}`;
}


