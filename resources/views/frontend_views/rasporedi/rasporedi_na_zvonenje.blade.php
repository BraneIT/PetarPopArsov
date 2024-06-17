@extends('frontend_views.layout.layout')

@section('title', 'Распоред на ѕвонење')

@section('page_header')
<h1>Распоред на ѕвонење</h1>
@endsection

@section('content')


<div class="erasmus-wrapper">
    <div class="documents-container">
        <div class="year-container"><h1>ОДДЕЛЕНСКА НАСТАВА</h1></div>
        <div class="raspored-table">
            <table class="raspored-na-zvonenje">
                
                <thead>
                    <tr>
                        <th>ЧАС</th>
                        <th>ПРВА СМЕНА</th>
                        <th>ВТОРА СМЕНА</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>7:30 - 8:10</td>
                        <td>12:30 - 13:10</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>8:15 - 8:55</td>
                        <td>13:15 - 13:55</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>9:00 - 9:40</td>
                        <td>14:00 - 14:40</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>ГОЛЕМ ОДМОР 20 МИН</td>
                        <td>ГОЛЕМ ОДМОР 20 МИН</td>
                    </tr>
                
                    <tr>
                        <td>4</td>
                        <td>10:00 - 10:40</td>
                        <td>15:00 - 15:40</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>10:45 - 11:25</td>
                        <td>15:45 - 16:25</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>11:30 - 12:10</td>
                        <td>16:40 - 17:10</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>12:15 - 12:55</td>
                        <td>17:15 - 17:55</td>
                    </tr>
                
                </tbody>
            </table>
        </div>
        <div class="year-container"><h1>ПРЕДМЕТНА НАСТАВА</h1></div>
        <div class="raspored-table">
            <table class="raspored-na-zvonenje predmetna">
                
                <thead>
                    <tr>
                        <th>ЧАС</th>
                        <th>ПРВА СМЕНА</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>7:30 - 8:10</td>
                        
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>8:15 - 8:55</td>
                        
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>9:00 - 9:40</td>
                        
                    </tr>
                    <tr>
                        <td></td>
                        
                        <td>ГОЛЕМ ОДМОР 20 МИН</td>
                    </tr>
                
                    <tr>
                        <td>4</td>
                        <td>10:00 - 10:40</td>
                        
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>10:45 - 11:25</td>
                        
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>11:30 - 12:10</td>
                        
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>12:15 - 12:55</td>
                       
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>13:00 - 13:40</td>
                       
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="raspored-table">
            <table class="raspored-na-zvonenje predmetna">
                
                <thead>
                    <tr>
                        <th>ЧАС</th>
                        <th>ВТОРА СМЕНА</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>13:00 - 13:40</td>
                        
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>13:45 - 14:25</td>
                        
                    </tr>
                    <tr>
                        <td></td>
                        <td>ГОЛЕМ ОДМОР 20 МИН</td>
                        
                    </tr>
                    <tr>
                        <td>3</td>
                        
                        <td>14:45 - 15:25</td>
                    </tr>
                
                    <tr>
                        <td>4</td>
                        <td>15:30 - 16:10</td>
                        
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>16:15 - 16:55</td>
                        
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>17:00 - 17:40</td>
                        
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>17:45 - 18:25</td>
                       
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>18:30 - 19:10</td>
                       
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection