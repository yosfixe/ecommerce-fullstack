import { Link } from 'react-router-dom';
import back from '../images/back.png';
function NoMatch() {
return (
    <div>
        <h1> Page Not Found </h1>
        <Link to={`/products`}>
        <img src={back} witdh="40" height="40" alt="back"/>
        </Link>
    </div>
)
}
export default NoMatch