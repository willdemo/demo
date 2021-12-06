/*
*
* Front End App to handle basic Student Object operations
*
* Requirements:
*
* 1. Write a class called Assignment, which has three instance variables.
*   title : a string
*   score : a double
*   description : a string
*
* 2. The Assignment class should validate and perform for the score input, based on the requirements below when initialized. Otherwise throw an error:
*       - Must be positive between 0 and 10
*       - If the decimal part is 0.6 or greater, round to next whole number.
*       - If the decimal part is 0.4 or lower, round to previous whole number.
*       - If the decimal part is 0.5, leave as it is. At the end returning scores should can only have 0 or .5 as the decimal part.
*
* 2. The Assignment class should have the following methods:
*   getQuickSummary: Print Assignment title and description in a readable format.
*   getAssignmentScore: Print score
*/

class Assignment {
	constructor(title,score,description) {
		if (score >= 10 || score <= 0 )  {
		 throw 'Socre must be posiitve beteen 0 and 10!';
		}
		if (score % 1 >= 0.6)
		{
			score=Math.round(score)
		}
        
		if (score % 1 <= 0.4)
		{
			score=Math.floor(score)
		}
        
        if (score % 1 < 0.6 && score % 1 > 0.4 )
		{
			score=Math.floor(score)+.5
		}
        
		this.title = title;
		this.score = score;
		this.description = description;
	}
	getQuickSummary() {
		console.log(`${this.title} ${this.description}`);
	}
	getAssignmentScore() {
		console.log(`score ${this.score}`);
	}
}

/*
* 3. Write a class called Student, which has three instance variables and constructor.
*   name : a string
*   last_name : a string
*   assignments : an array of items (of object type), with each item being an Assignment object that belong to the student.
*
* 4. The Student class should have the following methods:
*   getFullName: Print Student name plus last name
*   getAssignmentsScore: Print list of the User Assignments with the format: "$StudentName score was $AssignmentGrade for: $AssignmentName"
*   getFinalCourseScore:
*        Print message with final score and passing status based on the Assignments Array. It can be a simple calculation such as: (( $Score1 + $Score2 ...) / NumberOfScores).
*        Example output: "Steve's final score was 8. Steve passed the course."
*
*/

class Student {
	constructor(name,last_name,assignments) {
		this.name = name;
		this.last_name = last_name;
		this.assignments = assignments;
	}
	getFullName() {
		console.log(`${this.name} ${this.last_name}`);
	}
	getAssignmentsScore() {
		for (var key in this.assignments) {
		 console.log(`${this.name} score was ${this.assignments[key].score} for ${this.assignments[key].title}`);
		}
	}
	getFinalCourseScore() {
		let sum = 0;
		for (let i = 0; i < this.assignments.length; i++) {
			 sum += this.assignments[i].score;
		}

		let avg=Math.round(sum/this.assignments.length);
		console.log(`${this.name} final score was ${avg}. ${this.name} passed the course.`);

	}
}

/*
let test= new Assignment('java',8.45,'Java programming');
test.getQuickSummary();
test.getAssignmentScore();
*/

/*
let assignments=[new Assignment('java',7.6,'Java programming'),new Assignment('PHP',9.8,'PHP coding'),new Assignment('C',5.4,'C script') ];

let student=new Student('William','Zheng',assignments);
student.getFullName();
student.getAssignmentsScore();
student.getFinalCourseScore();
*/

