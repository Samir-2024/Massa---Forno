document.addEventListener('DOMContentLoaded', () => {
    const carrinhoContainer = document.getElementById('carrinho-tabela').getElementsByTagName('tbody')[0];
    const subTotalElement = document.getElementById('sub-total');
    const TotalElement = document.getElementById('Total');
    const frete = 20;

    let total = 0;
    
    // Carregar o carrinho do localStorage
    let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

    // Função para atualizar o carrinho na página
    function atualizarCarrinho() {
        carrinhoContainer.innerHTML = ''; // Limpa a tabela atual
        let subTotal = 0;

        // Para cada produto no carrinho, cria uma linha na tabela
        carrinho.forEach((produto, index) => {
            const preco = parseFloat(produto.preco);
            const total = preco * produto.quantidade;

            const linha = document.createElement('tr');
            linha.innerHTML = `
                <td><img src="${produto.imagem}" alt="${produto.nome}" width="50"></td>
                <td>${produto.nome}</td>
                <td>R$ ${preco.toFixed(2)}</td>
                <td>
                    <button1 onclick="alterarQuantidade(${index}, -1)">-</button1>
                    ${produto.quantidade}
                    <button1 onclick="alterarQuantidade(${index}, 1)">+</button1>
                </td>
                <td>R$ ${total.toFixed(2)}</td>
                <td><button1 onclick="removerProduto(${index})">Remover</button1></td>
            `;
            carrinhoContainer.appendChild(linha);

            // Atualiza o valor total
            subTotal += total;
        });

        // Atualiza o valor total no final
        subTotalElement.innerText = `R$ ${subTotal.toFixed(2)}`;
        totalElemetn.innerText = `R$ ${(subTotal + frete).toFixed(2)}`;
    }

    // Função para alterar a quantidade de um produto no carrinho
    window.alterarQuantidade = (index, delta) => {
        let produto = carrinho[index];
        if (produto) {
            produto.quantidade += delta;
            if (produto.quantidade < 1) produto.quantidade = 1;
            localStorage.setItem('carrinho', JSON.stringify(carrinho)); // Atualiza no localStorage
            atualizarCarrinho(); // Atualiza a visualização
        }
    };

    // Função para remover um produto do carrinho
    window.removerProduto = (index) => {
        carrinho.splice(index, 1); // Remove o produto
        localStorage.setItem('carrinho', JSON.stringify(carrinho)); // Atualiza no localStorage
        atualizarCarrinho(); // Atualiza a visualização
    };




    atualizarCarrinho();


    
});
