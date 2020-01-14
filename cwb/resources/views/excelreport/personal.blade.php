<table>
    <thead>
        <tr>
            <td align='center'>CIFStatusDesc </td>
            <td align='center'>CIF </td>
            <td align='center'>CustomerName </td>
            <td align='center'>AlternateName </td>
            <td align='center'>TradeName </td>
            <td align='center'>CustomerBirthDate </td>
            <td align='center'>DeceasedDate </td>
            <td align='center'>CustomerOpenDate </td>
            <td align='center'>AccountStatusDesc </td>
            <td align='center'>AccountNumber </td>
            <td align='center'>ProductDesc </td>
            <td align='center'>AccountOpenDate </td>
            <td align='center'>CustomerIndustryCode </td>
            <td align='center'>CustomerIndustryDesc </td>
            <td align='center'>CustomerSectorDesc </td>
            <td align='center'>Line1Address </td>
            <td align='center'>Line2Address </td>
            <td align='center'>Line3Address </td>
            <td align='center'>CustomerCityName </td>
            <td align='center'>PostalCode </td>
            <td align='center'>ProvinceStateCode </td>
            <td align='center'>AddressCountryCode </td>
            <td align='center'>LegalLine1Address </td>
            <td align='center'>LegalLine2Address </td>
            <td align='center'>LegalLine3Address </td>
            <td align='center'>LegalCustomerCityName </td>
            <td align='center'>LegalPostalCode </td>
            <td align='center'>LegalProvinceStateCode </td>
            <td align='center'>LegalAddressCountryCode </td>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; ?>
            @foreach ($data as $d)
            <tr>
                <td align="center">{{ $i++ }}</td>
                <td align="center">{{$d['account_status_desc']}}</td>
                <td align="center">{{$d['cif']}}</td>
                <td align="center">{{$d['customer_name']}}</td>
                <td align="center">{{$d['alternate_name']}}</td>
                <td align="center">{{$d['trade_name']}}</td>
                <td align="center">{{$d['customer_birth_date']}}</td>
                <td align="center">{{$d['deceased_date']}}</td>
                <td align="center">{{$d['customer_open_date']}}</td>
                <td align="center">{{$d['account_status_desc']}}</td>
                <td align="center">{{$d['account_number']}}</td>
                <td align="center">{{$d['product_desc']}}</td>
                <td align="center">{{$d['account_open_date']}}</td>
                <td align="center">{{$d['customer_industry_code']}}</td>
                <td align="center">{{$d['customer_industry_desc']}}</td>
                <td align="center">{{$d['customer_sector_desc']}}</td>
                <td align="center">{{$d['line_1_address']}}</td>
                <td align="center">{{$d['line_2_address']}}</td>
                <td align="center">{{$d['line_3_address']}}</td>
                <td align="center">{{$d['customer_city_name']}}</td>
                <td align="center">{{$d['postal_code']}}</td>
                <td align="center">{{$d['province_state_code']}}</td>
                <td align="center">{{$d['address_country_code']}}</td>
                <td align="center">{{$d['line_1_address_legal']}}</td>
                <td align="center">{{$d['line_2_address_legal']}}</td>
                <td align="center">{{$d['line_3_address_legal']}}</td>
                <td align="center">{{$d['customer_city_name_legal']}}</td>
                <td align="center">{{$d['postal_code_legal']}}</td>
                <td align="center">{{$d['province_state_code_legal']}}</td>
                <td align="center">{{$d['address_country_code_legal']}}</td>
            </tr>
         @endforeach
    </tbody>
</table>

