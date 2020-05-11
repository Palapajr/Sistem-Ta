import sqlalchemy as db
import pandas as pd
from sklearn.preprocessing import MinMaxScaler
from neupy import algorithms

# Inisialisasi koneksi DB ke mysql
engine = db.create_engine('mysql+pymysql://root@localhost:3306/pkh_pnn')
connection = engine.connect()
meta = db.MetaData()
training = db.Table('training', meta, autoload=True, autoload_with=engine)

# Load data training dan testing (nama file data testing yang diupload dari php harus sesuai dengan yang tertera dibawah)
data_train = pd.read_sql(db.select([training]), connection)
data_test = pd.read_excel("test.xlsx")

# Normalisasi Data Training dan Testing
minmax = MinMaxScaler()
X_train = minmax.fit_transform(data_train.loc[:,['sd','smp','sma','bumil','balita']])
X_test = minmax.transform(data_test.loc[:,['Anak SD','Anak SMP','Anak SMA','Ibu Hamil','Balita']])
y_train = data_train.loc[:,'kelas']
#y_test = data_test.loc[:,'Komponen']

# Pemrosesan data dengan PNN
pnn = algorithms.PNN(std=0.1, verbose=False)
pnn.train(X_train, y_train)

# Hasil prediksi diformat ke dataframe, disesuaikan dengan struktur tabel data testing di database
hasil = pnn.predict(X_test)
to_sql = pd.DataFrame(
    data_test.loc[:,['peserta','Nama_Pengurus','Anak SD','Anak SMP','Anak SMA','Ibu Hamil','Balita','Komponen']].values, 
    columns=data_train.columns
)
to_sql['prediksi'] = hasil

# Insert data ke tabel testing di database
db_testing = db.Table('testing', meta, autoload=True, autoload_with=engine)
to_sql.to_sql("testing", connection, if_exists='append', index=False, chunksize=50)