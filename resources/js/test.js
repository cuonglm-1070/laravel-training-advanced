const f = () => {
    const x =1;
    for (const y in [1,2,3]) {
        console.log(y*x);
    }
    return x;
}
