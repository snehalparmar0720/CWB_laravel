import pandas
import sqlconnect
import convert_excel_csv as cec


def testint(value):
    try:
        cast = int(value)
        return True
    except ValueError:
        return False


def upload(con, nppersonaldf):
    cursor = con.cursor
    nppersonalmapdf = pandas.read_csv('db_map_nonpersonal.csv', encoding='utf-8')

    for r in range(0, len(nppersonaldf)):
        columns = []
        values = []
        tables = []
        address_col = []
        address_val = []
        customer_col = []
        customer_val = []
        account_col = []
        account_col = []
        branch_val = []
        branch_val = []
        region_col = []
        region_val = []
        residence_col = []
        account_val = []
        account_col = []
        account_val = []
        account_col = []
        account_val = []
        for s in range(0, len(nppersonalmapdf)):
            cwbcolumnname = nppersonalmapdf['Spreadsheet'].iloc[s]
            sqlcolumnname = nppersonalmapdf['SQLColumn'].iloc[s]
            sqltablename = nppersonalmapdf['SQLTable'].iloc[s]
            columns.append(sqlcolumnname)
            tables.append(sqltablename)
            val = nppersonaldf[cwbcolumnname].iloc[r]

            if isinstance(val, float):
                val = 'NULL'
            elif isinstance(val, str):
                test_integer = testint(val)
                if test_integer == False:
                    val = "'" + val + "'"
                else:
                    pass
            values.append(val)
            if tables[s] == 'address':
                address_col.append(columns[s])
                address_val.append(values[s])
            if tables[s] == 'customer':
                customer_col.append(columns[s])
                customer_val.append(values[s])
            if tables[s] == 'account':
                account_col.append(columns[s])
                account_val.append(values[s])
        separator = ","
        address_val = separator.join(address_val)
        address_col = separator.join(address_col)

        separator = ","
        customer_val = separator.join(customer_val)
        customer_col = separator.join(customer_col)

        separator = ","
        account_val = separator.join(account_val)
        account_col = separator.join(account_col)

        print(account_val)
        print(account_col)


        sqlstring = 'INSERT INTO address (%s) VALUES (%s);' % (address_col, address_val)
        cursor.execute(sqlstring)
        #con.commitChange()
        record_id = cursor.execute('SELECT @@IDENTITY AS id;').fetchone()[0]

        sqlstring1 = ("INSERT INTO fake (name, address_id) VALUES (?,?)")
        Values = ["Snehal Parmar", record_id]
        cursor.execute(sqlstring1, Values)
        #con.commitChange()


conn = sqlconnect.sqlConnector('Driver={ODBC Driver 13 for SQL Server};'
                          'Server=DESKTOP-A2998RU\SQLEXPRESS;'
                          'Database=cwb_db_final;'
                          'Trusted_Connection=yes;')


ss = 'ALL-Self_Assessment _WEIGHTED TOTALS - FINAL.xlsm'  # replace with path to spreadsheet on your system


nonpersonal_data = cec.convert_xlsx_to_csv(ss)


upload(conn, nonpersonal_data)
