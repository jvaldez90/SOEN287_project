//functions to get students average, not fully automated yet just sample.
function averageBarry() {
    var a1 =  parseInt(document.getElementById("A1Barry").innerHTML);
    var a2 = parseInt(document.getElementById("A2Barry").innerHTML);
    var a3 = parseInt(document.getElementById("A3Barry").innerHTML);
    var midTerm = parseInt(document.getElementById("MidTerm_Barry").innerHTML);
    var final_Test = parseInt(document.getElementById("FinalExam_Barry").innerHTML);
    console.log(a1);


    var final = a1 + a2 + a3+ midTerm + final_Test;; 
    var total = (final/ 5).toFixed(2);
    document.getElementById("avgBarry").innerHTML = total + "%";
    return [a1, a2, a3, midTerm, final_Test];
}
function averageOliver() {
    var a1 =  parseInt(document.getElementById("A1Oliver").innerHTML);
    var a2 = parseInt(document.getElementById("A2Oliver").innerHTML);
    var a3 = parseInt(document.getElementById("A3Oliver").innerHTML);
    var midTerm = parseInt(document.getElementById("MidTerm_Oliver").innerHTML);
    var final_Test = parseInt(document.getElementById("FinalExam_Oliver").innerHTML);
    console.log(a1);


    var final = a1 + a2 + a3+ midTerm + final_Test;; 
    var total = (final/ 5).toFixed(2);
    document.getElementById("avgOliver").innerHTML = total + "%";
    return [a1, a2, a3, midTerm, final_Test];
}
function averageKara() {
    var a1 =  parseInt(document.getElementById("A1Kara").innerHTML);
    var a2 = parseInt(document.getElementById("A2Kara").innerHTML);
    var a3 = parseInt(document.getElementById("A3Kara").innerHTML);
    var midTerm = parseInt(document.getElementById("MidTerm_Kara").innerHTML);
    var final_Test = parseInt(document.getElementById("FinalExam_Kara").innerHTML);
    console.log(a1);


    var final = a1 + a2 + a3+ midTerm + final_Test;; 
    var total = (final/ 5).toFixed(2);
    document.getElementById("avgKara").innerHTML = total + "%";
    return [a1, a2, a3, midTerm, final_Test];
}
// ----------------------End of functions for student averages----------------------

// ----------------------Running functions and assigning results to variables----------------------
all_avgs_barry = averageBarry();
all_avgs_oliver = averageOliver();
all_avgs_kara = averageKara();

Avg_A1Barry = all_avgs_barry[0]; 
Avg_A2Barry = all_avgs_barry[1];
Avg_A3Barry = all_avgs_barry[2];
Avg_MidTerm_Barry = all_avgs_barry[3];
Avg_FinalExam_Barry = all_avgs_barry[4];


Avg_A1Oliver = all_avgs_oliver[0];
Avg_A2Oliver = all_avgs_oliver[1];
Avg_A3Oliver = all_avgs_oliver[2];
Avg_MidTerm_Oliver = all_avgs_oliver[3];
Avg_FinalExam_Oliver = all_avgs_oliver[4];

Avg_A1Kara = all_avgs_kara[0];
Avg_A2Kara = all_avgs_kara[1];
Avg_A3Kara = all_avgs_kara[2];
Avg_MidTerm_Kara = all_avgs_kara[3];
Avg_FinalExam_Kara = all_avgs_kara[4];
console.log(all_avgs_barry); //testing the console
console.log(all_avgs_oliver);
console.log(all_avgs_kara);
// ----------------------End of running functions and assigning results to variables----------------------

// ----------------------Function to calculate class averages for different tests/assignments----------------------
function classAssignment_averages() {
    var classAvgA1 = (Avg_A1Barry + Avg_A1Oliver + Avg_A1Kara) / 3;
    var classAvgA2 = (Avg_A2Barry + Avg_A2Oliver + Avg_A2Kara) / 3;
    var classAvgA3 = (Avg_A3Barry + Avg_A3Oliver + Avg_A3Kara) / 3;
    var classAvgMidTerm = (Avg_MidTerm_Barry + Avg_MidTerm_Oliver + Avg_MidTerm_Kara) / 3;
    var classAvgFinal = (Avg_FinalExam_Barry + Avg_FinalExam_Oliver + Avg_FinalExam_Kara) / 3;

    document.getElementById("AvgA1").innerHTML = classAvgA1.toFixed(2) + "%";
    document.getElementById("AvgA2").innerHTML = classAvgA2.toFixed(2) + "%";
    document.getElementById("AvgA3").innerHTML = classAvgA3.toFixed(2) + "%";
    document.getElementById("AvgMidterm").innerHTML = classAvgMidTerm.toFixed(2) + "%";
    document.getElementById("avgFinal").innerHTML = classAvgFinal.toFixed(2) + "%";
}

//run function
classAssignment_averages();