# -*- coding: utf-8 -*-
"""
Created on Sat May 16 01:39:25 2020

@author: fonts
"""
#sex: 1=female 0=male
#veiled: 1=yes 0=no
#https://www.zennioptical.com/   https://www.eyebuydirect.com/   https://heyyouwearthis.com/ 
import numpy as np
import pandas as pd
import matplotlib.pyplot as plt
from sklearn.model_selection import train_test_split
from sklearn.svm import SVC # for training
from sklearn.metrics import classification_report, confusion_matrix #evaluation
from sklearn.preprocessing import LabelEncoder  #convert string to numeric
#%matplotlib inline


#####CVS DATASET: DATA PREPROCESSING ###########
data=pd.read_csv("D:\TEKUP2020\Python\Projet_Glasses\dataset.csv")
data.shape #(row,column)
data.head() #how our dataset actually looks

#####    CONVERTING DATA #############
###Face Shape Conversion
X1=data['shape']
le = LabelEncoder()
X1New = le.fit_transform(X1)
X1New = X1New.reshape(-1,1)
###Skin Conversion
X2=data['skin']
le = LabelEncoder()
X2New = le.fit_transform(X2)
X2New = X2New.reshape(-1,1)
###Hair Conversion
X3=data['hair']
le = LabelEncoder()
X3New = le.fit_transform(X3)
X3New = X3New.reshape(-1,1)
###eye Conversion
X4=data['eye']
le = LabelEncoder()
X4New = le.fit_transform(X4)
X4New = X4New.reshape(-1,1)

X5=data['sex']
le = LabelEncoder()
X5New = le.fit_transform(X5)
X5New = X5New.reshape(-1,1)

X6=data['veiled']
le = LabelEncoder()
X6New = le.fit_transform(X6)
X6New = X6New.reshape(-1,1)

X7=data['outcome']
le = LabelEncoder()
X7New = le.fit_transform(X7)
X7New = X7New.reshape(-1,1)

dataNew=np.concatenate((X1New,X2New,X3New,X4New,X5New,X6New,X7New),axis=1)
#### Converting the numpy array into dataframe
dataset = pd.DataFrame({'shape': dataNew[:, 0], 'skin': dataNew[:, 1],
                        'hair': dataNew[:, 2],'eye': dataNew[:, 3],
                        'sex': dataNew[:, 4],'veiled': dataNew[:, 5],
                        'outcome': dataNew[:, 6]})



X = dataset.drop('outcome', axis=1) #store all the columns except the "outcome" column :attributes
y = dataset['outcome'] #store only the 'outcome' column

#divide data into training and test sets. with train_test_split
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size = 0.33)

#####   TRAINING THE ALGORITHM     ######

# svclassifier = SVC(kernel='linear')
svclassifier = SVC(kernel='poly',degree=8,gamma="auto") #polynomial
#svclassifier = SVC(kernel='rbf',gamma='auto') #Gaussian

'''svclassifier = SVC(kernel='sigmoid',gamma='auto') 
sigmoid function returns two values, 0 and 1, therefore it is more suitable for binary classification problems'''

svclassifier.fit(X_train, y_train)

y_pred = svclassifier.predict(X_test)  #making prediction
#evaluating the algorithm
print(confusion_matrix(y_test,y_pred))
print(classification_report(y_test,y_pred))








########################################################################
'''








from random import randint
import mysql.connector
from mysql.connector import Error

def create_connection(host_name, user_name, user_password, db_name):
    connection = None
    try:
        connection = mysql.connector.connect(
            host=host_name,
            user=user_name,
            passwd=user_password,
            database=db_name
        )
        print("Connection to MySQL DB successful")
    except Error as e:
        print(f"The error '{e}' occurred")

    return connection
connection = create_connection("localhost", "root", "", "glasse")

def execute_read_query(connection, query):
    cursor = connection.cursor()
    result = None
    try:
        cursor.execute(query)
        result = cursor.fetchall()
        return result
    except Error as e:
        print(f"The error '{e}' occurred")
        
select_product = "SELECT categorie_id as categorie, designation as nom,couleur,forme FROM product"
all_products = execute_read_query(connection, select_product)
print (all_products[0])

####################Filtered Products#########

###################DATASET#######################################
dataset={}

label=["id","face shape","skin tone","hair color","eye color","sex","veiled","product"]

##veiled :boolean
##product:int
face_shape=["square","round","heart","triangular","oval"]
'''
###########################
'''
oval=Square,cat-eye,aviator, and rectangular //cadre carre ou ronde//round, trapezoid, tortoise
rond:rectangular,square, geometric frame,oval (ronde à eviter)/wayferers,clear bridge
carre:ronde ,colored oval,browline//narrow ,cat-eye
trizngulair: oval,square,round
heart: oval,square,rectangular,Semi-Rimless And Rimless//aviatars
diamont: recta,gular,oval,cat eye glasses
'''
#######################################################################################
    

    






























