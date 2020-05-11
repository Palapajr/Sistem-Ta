import sqlalchemy as db
import pandas as pd
from sklearn.preprocessing import MinMaxScaler
from neupy import algorithms

engine = db.create_engine('mysql+pymysql://root@localhost:3306/pkh_pnn')
connection = engine.connect()
meta = db.MetaData()
training = db.Table('training', meta, autoload=True, autoload_with=engine)
testing = db.Table('testing', meta, autoload=True, autoload_with=engine)

data_train = pd.read_sql(db.select([training]), connection)
data_test = pd.read_sql(db.select([testing]), connection)

minmax = MinMaxScaler()
X_train = minmax.fit_transform(data_train.loc[:, ['sd','smp','sma','bumil','balita']])
X_test = minmax.transform(data_test.loc[:,['sd','smp','sma','bumil','balita']])
y_train = data_train.loc[:,'kelas']

pnn = algorithms.PNN(std=0.1, verbose=False)
pnn.train(X_train, y_train)
hasil = pnn.predict(X_test)

for id_data in data_test.id:
    query = db.update(testing).where(testing.columns.id == id_data).values(
        prediksi=str(hasil[id_data-1])
    )
    results = connection.execute(query)