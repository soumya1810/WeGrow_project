# from logging import debug
from flask import Flask, render_template, request 
import utils  
from utils import preprocessdata 

app = Flask(__name__) 

@app.route('/') 
def home(): 
    return render_template('loan_pred.html') 
@app.route('/predict', methods=['POST'])

def predict():  
    
    Gender = request.form.values('Gender')
    Married = request.form.values('Married')
    Education = request.form.values('Education')
    Self_Employed = request.form.values('Self_Employed')  
    ApplicantIncome = request.form.values('ApplicantIncome')  
    CoapplicantIncome = request.form.values('CoapplicantIncome') 
    LoanAmount = request.form.values('LoanAmount')   
    Loan_Amount_Term = request.form.values('Loan_Amount_Term')   
    Credit_History = request.form.values('Credit_History')   
    Property_Area = request.form.values('Property_Area')  

    prediction = utils.preprocessdata(Gender, Married, Education, Self_Employed, ApplicantIncome,
       CoapplicantIncome, LoanAmount, Loan_Amount_Term, Credit_History,
       Property_Area)

    return render_template('loan_pred.html', prediction=prediction) 

if __name__ == '__main__': 
    app.run(debug=True) 
