@extends ('layouts.master')

@section ('title')

    PlPredict | Rules

@stop

@section('content')

    <div class="standingouter colorwhite">

                    <h2>Rules</h2>

                    <h3>Prediction Deadline</h3>
    
                    <p>
                            Prediction deadline is 1 hour before kickoff for each fixture individually. So, even after a gameweek has 
                            started, predictions can still be made/edited for the fixtures that are yet to be closed.
                    </p>

                    <h3>Points System</h3>

                    <p>
                            The points are awarded as follows:
                    </p>

                    <table>

                    <tr>
                            <th> Result </th>
                            <th> Detail</th>
                            <th> Points awarded </th>
                    </tr>

                    <tr>
                            <td>Correctly Predicted Scoreline</td>
                            <td>The prediction was exactly correct.</td>
                            <td>10</td>
                    </tr>
                    
                    <tr>
                            <td>Correctly Predicted Goal-Difference &nbsp &nbsp &nbsp &nbsp &nbsp</td>
                            <td>It was not exactly correct but the GD was right (Not for draws). &nbsp &nbsp &nbsp &nbsp &nbsp</td>
                            <td>7</td>
                    </tr>

                    <tr>
                            <td>Correctly Predicted Draw</td>
                            <td>A draw was predicted and the result was also a draw.</td>
                            <td>6</td>
                    </tr>

                    <tr>
                            <td>Prediction Made</td>
                            <td>Point awarded for simply making a prediction</td>
                            <td>2</td>
                    </tr>

                    </table>

                    <br>
                    <br>

                    <p>
                            Only one of the above may be awarded for each fixture. They are <u>not additive</u>.
                    </p>
                    <br>
                    <p>
                            Some Examples:
                    </p>
                    <table>
                    <tr>
                            <th>Prediction</th>
                            <th>Result</th>
                            <th>Points</th>
                    </tr>

                    <tr>
                            <td>HomeTeam &nbsp2-1 &nbspAwayTeam &nbsp &nbsp &nbsp &nbsp</td>
                            <td>HomeTeam &nbsp2-1 &nbspAwayTeam &nbsp &nbsp &nbsp &nbsp</td>
                            <td>10</td>
                    </tr>
                    <tr>
                            <td>HomeTeam &nbsp2-2 &nbspAwayTeam &nbsp &nbsp &nbsp &nbsp</td>
                            <td>HomeTeam &nbsp2-2 &nbspAwayTeam &nbsp &nbsp &nbsp &nbsp</td>
                            <td>10</td>
                    </tr>
                    <tr>
                            <td>HomeTeam &nbsp3-1 &nbspAwayTeam &nbsp &nbsp &nbsp &nbsp</td>
                            <td>HomeTeam &nbsp2-0 &nbspAwayTeam &nbsp &nbsp &nbsp &nbsp</td>
                            <td>7</td>
                    </tr>
                    <tr>
                            <td>HomeTeam &nbsp2-2 &nbspAwayTeam &nbsp &nbsp &nbsp &nbsp</td>
                            <td>HomeTeam &nbsp0-0 &nbspAwayTeam &nbsp &nbsp &nbsp &nbsp</td>
                            <td>6</td>
                    </tr>
                    <tr>
                            <td>HomeTeam &nbsp3-1 &nbspAwayTeam &nbsp &nbsp &nbsp &nbsp</td>
                            <td>HomeTeam &nbsp1-0 &nbspAwayTeam &nbsp &nbsp &nbsp &nbsp</td>
                            <td>5</td>
                    </tr>
                    <tr>
                            <td>HomeTeam &nbsp2-2 &nbspAwayTeam &nbsp &nbsp &nbsp &nbsp</td>
                            <td>HomeTeam &nbsp2-1 &nbspAwayTeam &nbsp &nbsp &nbsp &nbsp</td>
                            <td>2</td>
                    </tr>
                    <tr>
                            <td>HomeTeam 2-1 AwayTeam &nbsp &nbsp &nbsp &nbsp</td>
                            <td>HomeTeam 0-1 AwayTeam &nbsp &nbsp &nbsp &nbsp</td>
                            <td>2</td>
                    </tr>
                    </table>

                    <h3>Boost</h3>

                    <p>
                            One prediction for each gameweek may be boosted. Boosted Predictions score <u>double points</u>.
                    </p>


    </div>

@stop
