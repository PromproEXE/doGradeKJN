<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;

class indexController extends Controller
{
    function index()
    {
        $url = 'http://dograde.online/kpn/default.aspx';
        $data = array(
            '__VIEWSTATE' => 'BhSUwZzZhEUe6bIGxLfQNZbNA6nKONB1PmtKKlxpdR/rODF6LqLG7OYp/Zd+o1g9QawMKPr5lumNm8LdaurusWGtH2mk1CAUfZShsmPQJv/9LnIJHl+lWAS2WoJ67DbCWdu+V78f//8yg3Kq+1UM8UX6xMlJJXqL8iZb7IPuxxC1+d1Kk/060J7pfjXGRQUHR1+cPc4ui9ymJow1xiOcKft9PXBWlrEaKycL00E/6jsFhl/Q0oJgCdokqrL/O6qYoHZF5nTqq00AwT3Z11s/hYdN54T29uRFK3bbLAZmvwQrPbImkmlTk+tWr0YRP2fh4IfxwO2+u4GZnrl76Ea8oWr5acPbcePh9s6sg/sBxpXIZmKQ4tw5WF+twL2Zl02afiLkZvKrgKUVaziK//vVcGf8MBayZYByDWk++pMboBlCvgQ7W/XQXaiH0MVLtGTBz86fkjfycGUJsvWV2CL9qddczc922JTAaLpPFivWS1JrOa+67brq6KwmjoDzhsMLk9aXEquNdVCXnE+k1jNef12UAMxmAN6HIf8BI23hcoLoJ6SZV/0M4EooPToRvPUKGIwnkTr21uzXaM9C5pQXHc1WUFD30L3r+ILlPuLxwQ6Ag3xmdFS7mRVTxrWxerjSqrl5IrqKIhyrtZILqDFy+dO/siyQD0rv4J2Q01Bn4l8/0eFFA3z8dMIsCSPBMyDU095C2xuZv+ioPAGdxpjUa6ufMjRVYGlrAaJIfP7CCs9YCwnDXz+G9ElI3k9O8fcXC4/UZH/kftngh+YOEh0pKr8WSyUNALFd+eDoaplq4Tbnxy++jHhUXJm/sABLxTuCEs+askKA9JCWcbD0g0qqssRAcSF76Re+ZLJXzG8LC0fwvVP/s9HSRHY4jc3x3mKygzV7D+ig/taoukXQsp+qKUQlojKA4QfRJWHCrsvj0hpEypcJpMLfvTpYXOc8wHlH00Ty6wTVcMZvJGtye1OL+Y9q/ZbYhrGgPMhrnb1rnjxjWNY4kWhN1a8AI9GmlrU03WqKVtFm//6cOSzxT96AKho1mpY2c+RRk8/PYznKj51MQ7k2wD1KkqfvNvXPoDB/LtCm3+Y90jXFksDlaMuhegEaLXTzvgkWzqZ5soUTJ1US3QZWrcHRXXOISkOBXqCq48v2iA0ZYN7M8GIc5NWl2eP4dkWbwT7ndTYcFdk9gEFdP2IGNBhAiMmGDjI9XxOGxllJPbE+bUOgSV9WH2eKWl8pGjew14/qsutbIuTTjSKAboSAxKQOv/5kQkU7qcg5n4jy2pC4QoTX5+OlEW5loL/D6PDic1oNcPBnieB6OW1d/6OPt8YI/S3/QChcS/doWEOnYZGaSMgRj3vNZMHKA3Mr4yjWGGXZQ6FFp0VOUmo=',
            '__VIEWSTATEGENERATOR' => 'BD62C3F6',
            '__EVENTVALIDATION' => 'n4Dxc/MA7u2p/4krOCN1IYRH0U4mTZgr6Nb7q4k9J6JzDODqfMnpmXb/mUckDsJs4P356mYauebteh3bi5rgJ7mfrbcS9j6VAUqOa0770gUOT1iRM4gCe9fOMPkWJPL6KYbFIdgMeNtQHPuMcJyu1X0XAwVw0QBVthN7ZaYB2SunlhzTzo3c7EoFV9iulMnNN/l7Tr7jDLKB1+8PB6hbwoQSurcuTh7aV6AoMPVR1HQqt/iGeQq6X4EjmX/g3D6wZxXhn9y3XYahxnVIb9Q/DbWnLHK0net/i7fVGMGjKMc7qqofCS3ba+5qhFdstOt8VQYXGb+C6l0ekYz+QOlQlsqDpofYz8C/Hg9nX/dkNBXNkTqtGvVJNbwDXQYxr9EbPBqWZKlqjmbdXS7TMrQzdH+mLeIGsJFZOqaPQZtK6hk=',
            'TxtUser' => '09362',
            'txtPassword' => '27/02/2548',
            'ButtonX1' => 'ปี1ภาค1'
        );
        $response = Http::asForm()->post($url, $data);
        // $response = Http::get($url);
        dd($response->getBody()->getContents());
        return view('frontend.index');
    }
    function getGrade(Request $request)
    {
        dd($request);
    }
}
