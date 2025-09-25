

<?php


class Result{
    public $ban = 66;
    public $eng = 50;
    public $social = 70;
    public $math = 80;
    public $religion = 50;
    public $ict = 33;

 public function getGpa($marks){
$gpa = null;
$grade = null;

if($marks>= 0 && $marks<33 ){
       $gpa = 0;
       $grade = "F";
        }else if ($marks>=33 && $marks<40){
      $gpa = 1;
      $grade = "D";
        }else if($marks>=40 && $marks<50){
            $gpa = 2;
            $grade = "C";
        }else if($marks>=50 && $marks<60){
              $gpa = 3;
            $grade = "B";
        }else if($marks>=60 && $marks<70){
              $gpa = 3.5;
            $grade = "A-";
        }else if($marks>=70 && $marks<80){
              $gpa = 4;
            $grade = "A";
        }else if ($marks>=80 && $marks<=100){
              $gpa = 5;
            $grade = "A+";
        }

        return [
          'gpa' => $gpa,
          'grade' => $grade
        ];
     }
}    


class Student extends Result{
  public function result(){
     $subject = [
        "Bangla" => $this->ban,
        "English" => $this->eng,
        "BGS" => $this->social,
        "Math" => $this->math,
        " Religion" => $this->religion,
        "ICT" => $this->ict,
       ];

       $result =[];
        $totalGpa =0;
       $count = 0;
       $failed =false;


       foreach($subject as $subject=>$marks){
        $data = $this->getGpa($marks);
        $result[$subject]=$data;
        $totalGpa +=$data['gpa'];
        $count++;
        if($data['gpa']==0){
          $failed=true;
        }
       }

       $finalGpa = $failed ? 0 : round($totalGpa / $count, 2);


       return [
            "subjects" => $result,
            "final_gpa" => $finalGpa
        ];
  }
}

$student = new Student();
$result = $student->result();

// Show subject-wise results
foreach ($result["subjects"] as $subject => $data) {
    echo "$subject: Grade = {$data['grade']}, GPA = {$data['gpa']} <br>";
}

// Show final GPA
echo "<b>Final GPA: {$result['final_gpa']}</b>";
