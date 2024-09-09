function convert() {
    const nilai = parseInt(document.getElementById('nilai').value);
    let grade;

    if (nilai >= 0 && nilai <= 40) {
        grade = 'E';
    }
    else if (nilai >= 41 && nilai <= 55) {
        grade = 'D';
    } 
    else if (nilai >= 56 && nilai <= 60) {
        grade = 'C';
    } 
    else if (nilai >= 61 && nilai <= 65) {
        grade = 'BC';
    } 
    else if (nilai >= 66 && nilai <= 70) {
        grade = 'B';
    } 
    else if (nilai >= 71 && nilai <= 80) {
        grade = 'AB';
    } 
    else if (nilai >= 81 && nilai <= 100) {
        grade = 'A';
    } 
    else {
        grade = 'Nilai tidak valid!';
    }
    document.getElementById('hasil').textContent = grade;
}
